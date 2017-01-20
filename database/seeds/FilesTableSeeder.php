<?php

use Illuminate\Database\Seeder;

use App\File;

class FilesTableSeeder extends Seeder
{
    public function run()
    {
        File::create(
	      [ 
	      	'user_id'	=>	1,
	      	'file_path'	=>	'/uploads/files/test.pdf',
	      	'type'		=>	'tm'
	      ]
    	);
    	File::create(
	      [ 
	      	'user_id'	=>	1,
	      	'file_path'	=>	'/uploads/files/test.pdf',
	      	'type'		=>	'fo'
	      ]
    	);
    	File::create(
	      [ 
	      	'user_id'	=>	1,
	      	'file_path'	=>	'/uploads/files/test.pdf',
	      	'type'		=>	'ni'
	      ]
    	);
    	File::create(
	      [ 
	      	'user_id'	=>	1,
	      	'file_path'	=>	'/uploads/files/test.pdf',
	      	'type'		=>	'do'
	      ]
    	);
    	File::create(
	      [ 
	      	'user_id'	=>	1,
	      	'file_path'	=>	'/uploads/files/test.pdf',
	      	'type'		=>	'cor_in'
	      ]
    	);
    	File::create(
	      [ 
	      	'user_id'	=>	1,
	      	'file_path'	=>	'/uploads/files/test.pdf',
	      	'type'		=>	'cor_out'
	      ]
    	);
    }
}
