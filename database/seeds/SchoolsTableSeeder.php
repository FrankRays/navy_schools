<?php

use Illuminate\Database\Seeder;
use App\School;

class SchoolsTableSeeder extends Seeder
{
    public function run()
    {
        School::create([ 'name' => 'Electrical School']);
        School::create([ 'name' => 'Engineering School']);
        School::create([ 'name' => 'Seamanship School']);
    }
}
