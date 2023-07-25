<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.use Iuse Illuminate\Support\Facades\Storage;lluminate\Support\Facades\Storage;
     */
    public function run(): void
    {
        //
        $units =[
            [
                'nama_unit'=>'superadmin',
                'keterangan'=>'superadmin',
            ],
            [
                'nama_unit'=>'kepala_bpom',
                'keterangan'=>'kbpom',
            ],
            [
                'nama_unit'=>'Sekretaris Utama',
                'keterangan'=>'Sestama',
            ],
        ];
        foreach ($units as $unit) {
            Unit::create($unit);
        }
    }
}
