<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Project;


class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = [
        	[
        		'name' => 'Project 1',
        		'description' => Str::random(20),
        		'start_date' => now(),
        		'budget' => '12345',
        		'client_id' => 1,
        		'status_id' =>1,
        		'created_at' => now(),
        		'updated_at' => now()
        	],
        	[
        		'name' => 'Project 1',
        		'description' => Str::random(20),
        		'start_date' => now(),
        		'budget' => '54321',
        		'client_id' => 2,
        		'status_id' =>2,
        		'created_at' => now(),
        		'updated_at' => now()
        	],
        	[
        		'name' => 'Project 1',
        		'description' => Str::random(20),
        		'start_date' => now(),
        		'budget' => '34215',
        		'client_id' => 3,
        		'status_id' =>1,
        		'created_at' => now(),
        		'updated_at' => now()
        	]
        ];

        Project::insert($projects);
    }
}
