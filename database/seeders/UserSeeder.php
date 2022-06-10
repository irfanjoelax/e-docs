<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Dr. Purbawati, M.T.',
            'email'     => 'purbawati@gmail.com',
            'password'  => Hash::make('123456'),
            'role'      => 'atasan'
        ]);

        User::create([
            'name'      => 'Muhammad Irfan Permana',
            'email'     => 'irfanthejoelax@gmail.com',
            'password'  => Hash::make('123456'),
            'role'      => 'admin'
        ]);

        User::create([
            'name'      => 'Nur Fadly Ramli',
            'email'     => 'fadly@gmail.com',
            'password'  => Hash::make('123456'),
            'role'      => 'petugas'
        ]);
    }
}
