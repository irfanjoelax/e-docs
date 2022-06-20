<?php

namespace Database\Seeders;

use App\Models\KeyActivation;
use Illuminate\Database\Seeder;

class KeyActivationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KeyActivation::create([
            'key' => 'bWRzXzIwMjItMDYtMjA=',
        ]);
    }
}
