<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UserTableSeeder');
    }

}

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Delete existing models for seed data
        User::where('id','>',0)->delete();
        //Elastic Search used to index seed data. Remove existing index first
        $client = new Elasticsearch\Client();
        $indexParams['index'] = 'users';
        $client->indices()->delete($indexParams);
        $indexParams['body']['settings']['number_of_shards']   = 1;
        $indexParams['body']['settings']['number_of_replicas'] = 1;
        $myTypeMapping = array(
            '_source' => array(
                'enabled' => true
            ),
            'properties' => array(
                'name' => array(
                    'type' => 'string',
                    'analyzer' => 'standard'
                )
            )
        );
        $indexParams['body']['mappings']['name'] = $myTypeMapping;
        $client->indices()->create($indexParams);
        //Allows Mass Assignment for Elequent ORM for User Model
        Eloquent::unguard();

        //Start with Fresh User Table
        DB::table('users')->delete();

        $faker = Faker\Factory::create();
        for ($i = 0; $i < 100; $i++)
        {
            $indexParams=array();
            //Create fake user data for seeding
            $name=$faker->name;
            $title='Staff assigned to '.$faker->bs;
            $company=$faker->company.(($i%2==1)?' '.$faker->companySuffix:'');
            $description=$name.' was '.$title.' at '.$company;
            $user = array(
                'name' => $name,
                'title' => $title,
                'description' => $description,
            );
            $user['id']=User::create($user)->id;
            $indexParams['body']=$user;
            $indexParams['index']='users';
            $indexParams['type']='name';
            $indexParams['id']=$user['id'];
            $client->index($indexParams);
        }
    }
}
