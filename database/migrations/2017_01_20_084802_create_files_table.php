<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('file_path');
            $table->string('type');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('files');
    }
}


File::create(
          [ 
            'user_id'   =>  1,
            'file_path' =>  '/uploads/files/test.pdf',
            'type'      =>  'tm'
          ]
        );
        File::create(
          [ 
            'user_id'   =>  1,
            'file_path' =>  '/uploads/files/test.pdf',
            'type'      =>  'fo'
          ]
        );
        File::create(
          [ 
            'user_id'   =>  1,
            'file_path' =>  '/uploads/files/test.pdf',
            'type'      =>  'ni'
          ]
        );
        File::create(
          [ 
            'user_id'   =>  1,
            'file_path' =>  '/uploads/files/test.pdf',
            'type'      =>  'do'
          ]
        );
        File::create(
          [ 
            'user_id'   =>  1,
            'file_path' =>  '/uploads/files/test.pdf',
            'type'      =>  'cor_in'
          ]
        );
        File::create(
          [ 
            'user_id'   =>  1,
            'file_path' =>  '/uploads/files/test.pdf',
            'type'      =>  'cor_out'
          ]
        );