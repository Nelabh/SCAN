<?php

use Illuminate\Database\Seeder;
use App\User;
use App\UserDetails;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $user = new User;
        $user->name = "Student";
        $user->email = "student@jssaten.ac.in";
        $user->password = Hash::make("student");
        $user->role = 1;
        $user->save();

        $user_details = new UserDetails;
        $user_details->contact = "9999999999";
        $user_details->father = "ddddd";
        $user_details->address = "dfghjk";
        $user_details->user_id = $user->id;
        $user_details->save();

        $user = new User;
        $user->name = "Teacher";
        $user->email = "teacher@jssaten.ac.in";
        $user->password = Hash::make("teacher");
        $user->role = 2;
        $user->save();

        $user_details = new UserDetails;
        $user_details->contact = "9999999999";
        $user_details->father = "ddddd";
        $user_details->address = "dfghjk";
        $user_details->user_id = $user->id;
        $user_details->save();
    }
}
