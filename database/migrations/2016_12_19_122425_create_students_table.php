<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('students', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('email')->unique();
          $table->string('photo_url')->nullable();
          $table->integer('serial_number')->nullable();
          $table->string('po_number')->nullable();
          $table->string('rank')->nullable();
          $table->string('mobile')->nullable();
          $table->string('blood_group')->nullable();
          $table->string('barrack_location')->nullable();
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('students');
    }
}
