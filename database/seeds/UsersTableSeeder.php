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
        //admin
        $user = User::create(['username' => 'admin','email' => 'admin@mail.com','password' => bcrypt('a')]);
        $user->attachRole(1);
        
        //electrical OIC
        $user = User::create(['username' => 'electrical','email' => '1@mail.com','password' => bcrypt('a')]);
        $user->attachRole(3);
        
        //engineering
        $user = User::create(['username' => 'engineering','email' => '2@mail.com','password' => bcrypt('a')]);
        $user->attachRole(4);
        
        //seamanship
        $user = User::create(['username' => 'seamanship','email' => '3@mail.com','password' => bcrypt('a')]);
        $user->attachRole(5);
        
        //electrical editor
        $user = User::create(['username' => 'electrical editor','email' => '1e@mail.com','password' => bcrypt('a')]);
        $user->attachRole(6);

        //engineering editor
        $user = User::create(['username' => 'engineering editor','email' => '2e@mail.com','password' => bcrypt('a')]);
        $user->attachRole(7);

        //seamanship editor
        $user = User::create(['username' => 'seamanship editor','email' => '3e@mail.com','password' => bcrypt('a')]);


    }
}
