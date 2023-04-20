<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => fake()->firstName(),
            'middlename' => fake()->word(),
            'lastname' => fake()->lastName(),
            'suffix' => rand(1, 5),
            'gender' => rand(1, 2),
            'birthdate' => fake()->date(),
            'civil_status' => rand(1, 5)
        ];
    }
}
