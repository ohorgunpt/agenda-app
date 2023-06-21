<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = [
            [
                'name'=>'superadmin',
                'email'=>'superadmin@seeder.com',
                'password'=>Hash::make('password'),
                'role'=>'superadmin',
            ],
            [
                'name'=>'tukepala',
                'email'=>'tukepala@seeder.com',
                'password'=>Hash::make('password'),
                'role'=>'tu_kepala',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
