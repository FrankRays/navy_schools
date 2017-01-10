<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Use this user for login as admin
        User::create(['username' => 'admin','email' => 'admin@mail.com','password' => bcrypt('a')]);

        //Use this user for login as user
        User::create(['username' => 'test','email' => 'test@mail.com','password' => bcrypt('a')]);
        //creating 10 test users
        // factory(User::class,10)->create();



    }
}
