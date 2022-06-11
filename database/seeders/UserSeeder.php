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
        // ROLE ATASAN
        $user = new User();
        $user->name = 'Dr. Purbawati, M.T.';
        $user->email = 'purbawati@gmail.com';
        $user->password = Hash::make('123456');
        $user->role = 'atasan';
        $user->save();

        // ROLE ADMIN
        $user = new User();
        $user->name = 'Muhammad Irfan Permana, S.Kom.';
        $user->email = 'irfan@gmail.com';
        $user->password = Hash::make('123456');
        $user->role = 'admin';
        $user->save();

        // ROLE PETUGAS
        $user = new User();
        $user->name = 'Nur Fadly Ramli';
        $user->email = 'fadly@gmail.com';
        $user->password = Hash::make('123456');
        $user->role = 'petugas';
        $user->save();
    }
}
