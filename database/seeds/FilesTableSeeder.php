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
	      	'school_id'	=>	1,
	      	'file_path'	=>	'/uploads/files/test.pdf',
	      	'type'		=>	'tm',
	      	'approval'	=>	false
	      ]
    	);
    	File::create(
	      [ 
	      	'user_id'	=>	1,
	      	'school_id'	=>	1,
	      	'file_path'	=>	'/uploads/files/test.pdf',
	      	'type'		=>	'fo',
	      	'approval'	=>	true
	      ]
    	);
    	File::create(
	      [ 
	      	'user_id'	=>	1,
	      	'file_path'	=>	'/uploads/files/test.pdf',
	      	'type'		=>	'ni',
	      	'approval'	=>	true
	      ]
    	);
    	File::create(
	      [ 
	      	'user_id'	=>	1,
	      	'file_path'	=>	'/uploads/files/test.pdf',
	      	'type'		=>	'do',
	      	'approval'	=>	false
	      ]
    	);
    	File::create(
	      [ 
	      	'user_id'	=>	1,
	      	'school_id'	=>	1,
	      	'file_path'	=>	'/uploads/files/test.pdf',
	      	'type'		=>	'cor_in',
	      	'approval'	=>	false
	      ]
    	);
    	File::create(
	      [ 
	      	'user_id'	=>	1,
	      	'file_path'	=>	'/uploads/files/test.pdf',
	      	'type'		=>	'cor_out',
	      	'approval'	=>	false
	      ]
    	);
    }
}
