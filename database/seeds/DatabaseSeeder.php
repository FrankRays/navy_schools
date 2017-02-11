<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(EntrustTableSeeder::class);
        $this->call(SchoolsTableSeeder::class);
        $this->call(CourseTableSeeder::class);
        $this->call(ClassesTableSeeder::class);
        $this->call(FilesTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(CourseFilesTableSeeder::class);
        $this->call(ResultsTableSeeder::class);
        $this->call(MarksTableSeeder::class);
        $this->call(LaboratoryTableSeeder::class);
        $this->call(LabPhotosTableSeeder::class);

        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

        Model::reguard();
    }
}
