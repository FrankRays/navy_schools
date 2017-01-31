<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('school_id')->unsigned();
            $table->string('name');
            $table->string('code');
            $table->string('officer')->nullable();
            $table->string('officer_mobile')->nullable();
            $table->string('chief')->nullable();
            $table->string('chief_mobile')->nullable();

            $table->integer('strength')->nullable();
            $table->string('duration');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('approval')->default(false);

            $table->timestamps();

            $table->foreign('school_id')
                ->references('id')->on('schools')
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
        Schema::drop('courses');
    }
}
