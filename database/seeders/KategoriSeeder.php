<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Category;

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
    foreach ($kategori as $value) {

        Category::create($value);
    }
}
}
