<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nip'           => $this->faker->numberBetween(1811111, 1999999),
            'nama'          => $this->faker->name(),
            'golongan_id'   => $this->faker->numberBetween(1, 3),
            'jabatan_id'    => $this->faker->numberBetween(1, 6),
            'tgl_lahir'     => $this->faker->date('Y-m-d', 'now'),
            'telp'          => $this->faker->e164PhoneNumber(),
            'alamat'        => $this->faker->address(),
            'status'        => $this->faker->randomElement(['pns', 'honor']),
        ];
    }
}
