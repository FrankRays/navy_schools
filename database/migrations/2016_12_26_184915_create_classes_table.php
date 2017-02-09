<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->unsigned();
            $table->integer('course_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('code');
            $table->string('officer')->nullable();
            $table->string('officer_mobile')->nullable();
            $table->string('chief')->nullable();
            $table->string('chief_mobile')->nullable();
            $table->string('instructor')->nullable();
            $table->string('instructor_mobile')->nullable();


            $table->string('strength')->nullable();
            $table->string('duration')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();

            $table->boolean('approval')->default(false);

            $table->foreign('school_id')
                ->references('id')->on('schools')
                ->onDelete('cascade');

            $table->foreign('course_id')
                ->references('id')->on('courses')
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
        Schema::drop('classes');
    }
}
