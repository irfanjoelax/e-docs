<?php

namespace Database\Seeders;

use App\Models\Klasifikasi;
use Illuminate\Database\Seeder;

class KlasifikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Klasifikasi::create([
            'nama' => 'Izin Kegiatan',
            'kode' => 'C',
            'uraian' => 'Ini Kode Klasifikasi Untuk Surat Izin Kegiatan',
        ]);

        Klasifikasi::create([
            'nama' => 'Undangan',
            'kode' => 'A',
            'uraian' => 'Ini Kode Klasifikasi Untuk Undangan',
        ]);

        Klasifikasi::create([
            'nama' => 'Perjalanan Dinas',
            'kode' => 'C',
            'uraian' => 'Ini Kode Klasifikasi Untuk Perjalanan Kantor',
        ]);
    }
}
