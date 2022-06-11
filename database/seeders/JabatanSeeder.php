<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::create([
            'jabatan' => 'Kepala Badan'
        ]);
        Jabatan::create([
            'jabatan' => 'Sekretaris'
        ]);
        Jabatan::create([
            'jabatan' => 'Bendahara'
        ]);
        Jabatan::create([
            'jabatan' => 'Tenaga Teknis Harian'
        ]);
        Jabatan::create([
            'jabatan' => 'Tenaga Kebersihan'
        ]);
        Jabatan::create([
            'jabatan' => 'Operator Komputer'
        ]);
    }
}
