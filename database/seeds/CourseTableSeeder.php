<?php

use Illuminate\Database\Seeder;
use App\Course;

class CourseTableSeeder extends Seeder
{
    public function run()
    {
    	/**
		Electrical School:
		1. Long Electrical Course (LEC)
		2. Ag S Lt (X) Course
		3. BRCC (L & R) 
		4. EA-IV ‘Q’
		5. REA-IV ‘Q’
		6. Prob EA-IV (Dock Yard Entry)
		7. Prob EA-IV (Spl Entry)
		8. Prob REA-IV (Dock Yard Entry)
		9. Prob REA-IV (Spl Entry)
		10.  LEN ‘Q’
		11. LREN ‘Q’
		12. EN-II (UT)
		13. REN-II (UT) 
    	*/
        Course::create([ 'name' => 'Long Electrical Course (LEC)',
        				'code'	=>	'Alpha',
						'school_id' => 1, 
						'officer'	=>	'Officer1',
						'officer_mobile'	=>	'019233123',
						'chief'	=>	'Chief1',
						'chief_mobile'	=> '012321412',
						'strength'	=>	50,
						'duration'	=> '10 weeks',
						'start_date'	=>	date("Y/m/d", strtotime("-2 Months")),
						'end_date'	=>	date("Y-m-d", strtotime("+3 Months")),
						'approval'	=>	true
					]);


        Course::create([ 'name' => 'Ag S Lt (X) Course',
        				'code'	=>	'Beta',
						'school_id' => 1, 
						'officer'	=>	'Officer1',
						'officer_mobile'	=>	'019233123',
						'chief'	=>	'Chief1',
						'chief_mobile'	=> '012321412',
						'strength'	=>	50,
						'duration'	=> '10 weeks',
						'start_date'	=>	date("Y/m/d"),
						'end_date'	=>	date("Y-m-d", strtotime("+3 Months")),
						'approval'	=>	true
					]);

		Course::create([ 'name' => 'BRCC (L & R)',
						'code'	=>	'Beta',
						'school_id' => 1, 
						'officer'	=>	'Officer1',
						'officer_mobile'	=>	'019233123',
						'chief'	=>	'Chief1',
						'chief_mobile'	=> '012321412',
						'strength'	=>	50,
						'duration'	=> '10 weeks',
						'start_date'	=>	date("Y/m/d"),
						'end_date'	=>	date("Y-m-d", strtotime("+1 Months")),
						'approval'	=>	false 
					]);

		Course::create([ 'name' => 'EA-IV ‘Q’',
						'code'	=>	'Beta',
						'school_id' => 1, 
						'officer'	=>	'Officer1',
						'officer_mobile'	=>	'019233123',
						'chief'	=>	'Chief1',
						'chief_mobile'	=> '012321412',
						'strength'	=>	50,
						'duration'	=> '10 weeks',
						'start_date'	=>	date("Y/m/d"),
						'end_date'	=>	date("Y-m-d", strtotime("+2 Months")),
						'approval'	=>	false  
					]);

    }
}
