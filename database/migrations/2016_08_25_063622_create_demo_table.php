<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();;
            $table->integer('reg')->nullable();
            $table->string('sex')->nullable();
            $table->string('birthday')->nullable();
            $table->string('address')->nullable();
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
        Schema::drop('demo');
    }
}
