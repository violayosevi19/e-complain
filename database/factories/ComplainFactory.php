<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Complain>
 */
class ComplainFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'jeniscomplain_id' =>  mt_rand(1,5),
            'complain' => $this->faker->paragraph(),
            'tanggapan' => $this->faker->paragraph(),
        ];
    }
}
