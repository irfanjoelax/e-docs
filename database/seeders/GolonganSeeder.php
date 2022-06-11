<?php

namespace Database\Seeders;

use App\Models\Golongan;
use Illuminate\Database\Seeder;

class GolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Golongan::create([
            'golongan' => 'I/a Juru Muda',
        ]);

        Golongan::create([
            'golongan' => 'II/a Pengatur Muda',
        ]);

        Golongan::create([
            'golongan' => 'III/a Penata Muda',
        ]);
    }
}
