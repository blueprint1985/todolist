<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('projects')->delete();

        $projects = array(
        	['pname' => 'Birdie'],
        	['pname' => 'Fiskpinne'],
        	['pname' => 'KulGrej']
        );

        // Uncomment the below to run the seeder
        DB::table('projects')->insert($projects);
    }
}
