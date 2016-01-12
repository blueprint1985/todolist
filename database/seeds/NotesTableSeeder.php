<?php

use Illuminate\Database\Seeder;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('notes')->delete();

        $notes = array(
        	['user_id' => 1, 'project_id' => 1, 'content' => 'asdasd'],
        	['user_id' => 1, 'project_id' => 2, 'content' => 'qweqwe'],
        	['user_id' => 1, 'project_id' => 3, 'content' => 'zxczxc'],
        	['user_id' => 1, 'project_id' => 2, 'content' => '123123'],
        	['user_id' => 2, 'project_id' => 1, 'content' => 'jkljkl'],
        	['user_id' => 2, 'project_id' => 2, 'content' => 'tyutyu'],
        	['user_id' => 2, 'project_id' => 3, 'content' => 'bnmbnm']
        );

        // Uncomment the below to run the seeder
        DB::table('notes')->insert($notes);
    }
}
