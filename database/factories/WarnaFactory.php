<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WarnaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_warna' => $this->faker->colorName(),
            'keterangan' => $this->faker->sentence(),
        ];
    }
}
