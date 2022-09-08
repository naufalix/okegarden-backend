<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'=>'User',
                'email'=>'u@naufal.dev',
                'role'=>'user',
                'password'=> bcrypt('user'),
            ],
            [
                'name'=>'Gardener',
                'email'=>'g@naufal.dev',
                'role'=> 'gardener',
                'password'=> bcrypt('gardener'),
            ],
            [
                'name'=>'Designer',
                'email'=>'d@naufal.dev',
                'role'=>'designer',
                'password'=> bcrypt('designer'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }

        $projects = [
            [
                'nama'=>'Project P1',
                'keterangan'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ',
                'status'=>'Selesai',
            ],
            [
                'nama'=>'Project P2',
                'keterangan'=>'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ',
                'status'=>'Berjalan',
            ],
            [
                'nama'=>'Project P3',
                'keterangan'=>'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                'status'=>'Selesai',
            ],
        ];

        foreach ($projects as $key => $project) {
            Project::create($project);
        }
    }
}
