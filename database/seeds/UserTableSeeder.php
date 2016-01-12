<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('users')->delete();

        $users = array(
        	['uname' => 'BluePrint', 'email' => 'martinbjorling@gmail.com', 'password' => 'temp'],
        	['uname' => 'Howken', 'email' => 'nekwoh@gmail.com', 'password' => 'temp']
        );

        // Uncomment the below to run the seeder
        DB::table('users')->insert($users);
    }
}
