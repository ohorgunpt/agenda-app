<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $kategori = [
            [
           'namakategori'=>'rapat',
        ],
        [
            'namakategori'=>'audiensi',
         ],
         [
            'namakategori'=>'dinas luar',
         ],
    ];
    }
}
