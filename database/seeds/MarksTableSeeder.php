<?php

use Illuminate\Database\Seeder;

use App\Mark;

class MarksTableSeeder extends Seeder
{
    public function run()
    {
        Mark::create(
	      [ 
	      	'result_id'		=>	1,
        	'student_id'	=>	1,
        	'marks_obtained'=>	80
	      ]
    	);
    }
}
