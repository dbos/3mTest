<?php

class AboutController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |    Route::get('/', 'HomeController@showWelcome');
    |
    */

    public function getUsers()
    {
    $users=User::all();
    $returnedView=View::make('header',array('title'=>'Food Inc :: About'));
    $returnedView.=View::make('about', array('users'=>$users));
    $returnedView.=View::make('footer');
    return $returnedView;
    }
    public function getUser($id){
        $user=User::find($id);
        return array('name'=>$user->name,'title'=>$user->title,'description'=>$user->description);
    }

}
