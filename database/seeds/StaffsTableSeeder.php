<?php

use Illuminate\Database\Seeder;

use App\Staff;

class StaffsTableSeeder extends Seeder
{
    public function run()
    {
    	Staff::create([
    		'user_id'	=>	2,
    		'school_id'	=>	1,
    		'rank'		=>	'PC',
    		'name'		=>	'Test Name',
    		'po'		=>	'adad',
    		'type'		=>	'civil',
            'appointment'=> 'Course Officer',
            'contact'   =>  '012312323'
    	]);


    	Staff::create([
    		'user_id'	=>	1,
    		'school_id'	=>	null,
    		'rank'		=>	'PC',
    		'name'		=>	'Test2 Name',
    		'po'		=>	'adad',
    		'type'		=>	'officer',
            'appointment'=> 'Course Officer',
            'contact'   =>  '012312323'
    	]);
    }
}
