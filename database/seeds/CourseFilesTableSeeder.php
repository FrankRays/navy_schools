<?php

use Illuminate\Database\Seeder;

use App\CourseFile;

class CourseFilesTableSeeder extends Seeder
{
    public function run()
    {
        CourseFile::create(
	      [ 
	      	'course_id'	=>	1,
	      	'file_path'	=>	'/uploads/files/test.pdf',
	      	'type'		=>	'si'
	      ]
    	);

    	CourseFile::create(
	      [ 
	      	'course_id'	=>	1,
	      	'file_path'	=>	'/uploads/files/test.pdf',
	      	'type'		=>	'syllabus',
	      	'subject'	=>	'sub1'
	      ]
    	);
    }
}
