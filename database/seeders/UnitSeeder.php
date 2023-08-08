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
                'nama_unit'=>'Kepala Badan POM',
                'keterangan'=>'kbpom',
            ],
            [
                'nama_unit'=>'Sekretaris Utama',
                'keterangan'=>'Sestama',
            ],
            [
                'nama_unit'=>'Inspektur Utama',
                'keterangan'=>'Irtama',
            ],
            [
                'nama_unit'=>'Deputi 1',
                'keterangan'=>'Deputi 1',
            ],
            [
                'nama_unit'=>'Deputi 2',
                'keterangan'=>'Deputi 2',
            ],
            [
                'nama_unit'=>'Deputi 3',
                'keterangan'=>'deputi 3',
            ],
            [
                'nama_unit'=>'Deputi 4',
                'keterangan'=>'Deputi 4',
            ],
        ];
        foreach ($units as $unit) {
            Unit::create($unit);
        }
    }
}
