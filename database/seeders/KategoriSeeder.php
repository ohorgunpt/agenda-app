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
           'namakategori'=>'Acara',
        ],
        [
            'namakategori'=>'Agenda Khusus',
         ],
         [
            'namakategori'=>'Audiensi',
         ],
         [
            'namakategori'=>'Briefing',
         ],
         [
            'namakategori'=>'Jumpa Pers (Termasuk Door Stop, Wawancara Media)',
         ],
         [
            'namakategori'=>'Kunjungan Kerja Dalam Negeri',
         ],
         [
            'namakategori'=>'Kunjungan Kerja Luar Negeri',
         ],
         [
            'namakategori'=>'Rapat',
         ],
         [
            'namakategori'=>'Upacara',
         ],
         [
            'namakategori'=>'Upacara Pelantikan',
         ],
         [
            'namakategori'=>'Wawancara kandidat',
         ],
         [
            'namakategori'=>'Unclassified',
         ],
    ];
    foreach ($kategori as $value) {

        Category::create($value);
    }
}
}
