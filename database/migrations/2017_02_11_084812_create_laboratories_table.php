<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaboratoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboratories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('oic')->nullable();
            $table->string('oic_mobile')->nullable();
            $table->string('lic')->nullable();
            $table->string('lic_mobile')->nullable();
            $table->text('lab_facility')->nullable();
            $table->text('equipment_list')->nullable();
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
        Schema::drop('laboratories');
    }
}
