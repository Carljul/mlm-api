<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => fake()->unique()->safeEmail(),
            'role_id' => Roles::all()->random()->id,
            'password' => Hash::make("password"),
            'is_active' => collect([true, false])->random(),
            'cellphone_number' => fake()->phoneNumber(),
            'person_id' => 0,
            'genealogy_invitation_code' => fake()->word(),
            'profile_image' => fake()->word(),
            'email_verified_at' => time(),
            'cellphone_number_verified_at' => time(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
            'cellphone_number_verified_at' => null
        ]);
    }
}
