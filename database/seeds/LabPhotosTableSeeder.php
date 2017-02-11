<?php

use Illuminate\Database\Seeder;

use App\LabPhoto;

class LabPhotosTableSeeder extends Seeder
{
    public function run()
    {
        LabPhoto::create([
        	'lab_id'		=>	1,
        	'file_path'		=>	'/img/img_2.jpg',
        	'description'	=>	'A test Lab'
        ]);
    }
}
