<?php

use Illuminate\Database\Seeder;
use App\Classes;

class ClassesTableSeeder extends Seeder
{
    public function run()
    {
        Classes::create([ 'name' => 'Long Electrical Course (LEC)',
        				'code'	=>	'Alpha',
						'school_id' => 1,
						'course_id'	=>	1, 
						'officer'	=>	'Officer1',
						'officer_mobile'	=>	'019233123',
						'chief'	=>	'Chief1',
						'chief_mobile'	=> '012321412',
						'instructor'	=>	'Inst1',
						'instructor_mobile'	=> '012321412',
						'strength'	=>	50,
						'duration'	=> '10 weeks',
						'start_date'	=>	date("Y/m/d", strtotime("-2 Months")),
						'end_date'	=>	date("Y-m-d", strtotime("+3 Months")) ,
						'approval'	=>	true  
					]);

        Classes::create([ 'name' => 'Ag S Lt (X) Course',
        				'code'	=>	'Beta',
						'school_id' => 1,
						'course_id'	=>	2, 
						'officer'	=>	'Officer1',
						'officer_mobile'	=>	'019233123',
						'chief'	=>	'Chief1',
						'chief_mobile'	=> '012321412',
						'instructor'	=>	'Inst1',
						'instructor_mobile'	=> '012321412',
						'strength'	=>	50,
						'duration'	=> '10 weeks',
						'start_date'	=>	date("Y/m/d", strtotime("-2 Months")),
						'end_date'	=>	date("Y-m-d", strtotime("+3 Months")),
						'approval'	=>	false
					]);
    }
}
