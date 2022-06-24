<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\friends>
 */
class friendsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
                'groups_id' => $this->faker->numberBetween($min = 0, $max = 10),
                'nama'  => $this->faker->name(),
                'no_tlpn'  => $this->faker->phoneNumber(),
                'alamat'  => $this->faker->address(),


        ];
    }
}
