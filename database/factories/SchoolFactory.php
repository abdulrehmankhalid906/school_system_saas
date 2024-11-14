<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\School>
 */
class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string
     *  mixed>
     */
    public function definition(): array
    {
        return [
            // 'user_id' => rand(1,10),
            'name' => $this->faker->unique()->company . ' School No - ' . rand(1, 100),
            'address' => $this->faker->address,
            'district' => $this->faker->country,
            'city' => $this->faker->city,
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'website' => $this->faker->url(),
            'registration_number' => $this->faker->unique()->numberBetween(1000, 99999) . '_' . $this->faker->unique()->numberBetween(1, 1000),
            'established_year' => $this->faker->year
        ];
    }
}
