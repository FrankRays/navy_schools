<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class EntrustTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('name',config('customConfig.roles.admin'))->first();
        $user = Role::where('name',config('customConfig.roles.user'))->first();
        $adminUser = User::first();
        $adminUser->attachRole($admin);
        $getAllusers = User::all();
        foreach ($getAllusers as $person) {
            $person->attachRole($user);
        }
    }
}
