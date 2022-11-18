<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run()
    // {
    //     DB::table('users')->insert([
    //         'name' => 'admin',
    //         'email' => 'admin@gmail.com',
    //         'password' => Hash::make('password'),
    //     ]);
    // }

    public function run()
    {
        $users = [
            [
               'name'=>'Admin User',
               'email'=>'admin@gmail.com',
               'type'=>1,
               'password' => Hash::make('password'),
            ],
            [
               'name'=>'Operator',
               'email'=>'operator@gmail.com',
               'type'=>0,
               'password' => Hash::make('password'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
