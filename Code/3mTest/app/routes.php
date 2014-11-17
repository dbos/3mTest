<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    $returnedView=View::make('header',array('title'=>'Food Inc :: Home'));
    $returnedView.=View::make('food');
    $returnedView.=View::make('footer');
    return $returnedView;
});
Route::get('/about', 'AboutController@getUsers');
Route::get('/users/{id}', 'AboutController@getUser');
Route::get('/eligibility', function()
{
    $returnedView=View::make('header',array('title'=>'Food Inc :: Eligibility'));
    $returnedView.=View::make('eligibility');
    $returnedView.=View::make('footer');
    return $returnedView;
});
