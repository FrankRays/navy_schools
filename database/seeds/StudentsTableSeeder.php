<?php

use App\Student;
use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Student::create(
      [ 'name' => 'student-1',
        'school_id' =>  1,
        'class_id'  =>  1,
        'email' => 'student1@mail.com',
        'photo_url'  =>  '/uploads/students/test.jpg',
        'serial_number' =>  12345,
        'po_number' =>  '124',
        'rank'  =>  'major general',
        'blood_group' =>  'O+',
        'barrack_location'  =>  'Sylhet',
        'mobile'  =>  '017777777'
      ]
    );
    }
}
