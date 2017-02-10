<?php

use Illuminate\Database\Seeder;

use App\Result;

class ResultsTableSeeder extends Seeder
{
    public function run()
    {
        Result::create(
	      [ 
	      	'class_id'	=>	1,
	      	'file_path'	=>	'/uploads/files/test.pdf',
	      	'subject'	=>	'Test Subject',
	      	'full_marks'=>	100
	      ]
    	);
    }
}
