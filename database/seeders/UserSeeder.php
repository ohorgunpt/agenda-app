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
                'nip'=>'123',
                'unit_id'  =>1,
            ],
            [
                'name'=>'tukepala',
                'email'=>'tukepala@seeder.com',
                'password'=>Hash::make('password'),
                'role'=>'tu_kepala',
                'nip'=>'234',
                'unit_id' =>2,

            ],
            [
                'name'=>'dsp',
                'email'=>'dsp@seeder.com',
                'password'=>Hash::make('password'),
                'role'=>'dsp',
                'nip'=>'2345',
                'unit_id' =>2,

            ],
            [
                'name'=>'humas',
                'email'=>'humas@seeder.com',
                'password'=>Hash::make('password'),
                'role'=>'humas',
                'nip'=>'23456',
                'unit_id' =>2,

            ],
            [
                'name'=>'tu_sestama',
                'email'=>'tu_sestama@seeder.com',
                'password'=>Hash::make('password'),
                'role'=>'tu_sestama',
                'nip'=>'2344567',
                'unit_id' =>3,

            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
