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
                'unit_id'  =>1,
            ],
            [
                'name'=>'tukepala',
                'email'=>'tukepala@seeder.com',
                'password'=>Hash::make('password'),
                'role'=>'tu_kepala',
                'unit_id' =>2,

            ],
            [
                'name'=>'dsp',
                'email'=>'dsp@seeder.com',
                'password'=>Hash::make('password'),
                'role'=>'dsp',
                'unit_id' =>2,

            ],
            [
                'name'=>'humas',
                'email'=>'humas@seeder.com',
                'password'=>Hash::make('password'),
                'role'=>'humas',
                'unit_id' =>2,

            ],
            [
                'name'=>'tu_sestama',
                'email'=>'tu_sestama@seeder.com',
                'password'=>Hash::make('password'),
                'role'=>'tu_sestama',
                'unit_id' =>2,

            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
