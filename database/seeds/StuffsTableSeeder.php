<?php

use Illuminate\Database\Seeder;

use App\Stuff;

class StuffsTableSeeder extends Seeder
{
    public function run()
    {
    	Stuff::create([
    		'user_id'	=>	2,
    		'school_id'	=>	1,
    		'rank'		=>	'PC',
    		'name'		=>	'Test Name',
    		'po'		=>	'adad',
    		'type'		=>	'civil'
    	]);


    	Stuff::create([
    		'user_id'	=>	1,
    		'school_id'	=>	null,
    		'rank'		=>	'PC',
    		'name'		=>	'Test2 Name',
    		'po'		=>	'adad',
    		'type'		=>	'officer'
    	]);
    }
}
