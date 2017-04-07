<?php

use Illuminate\Database\Seeder;
use App\User;
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
        $user = new User;
        $user->name = "Teacher";
        $user->email = "teacher@jssaten.ac.in";
        $user->password = Hash::make("teacher");
        $user->role = 2;
        $user->save();



    }
}
