<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            "title" => fake()->jobTitle(),
            "company_name" => fake()->company(),
            "salary" => "$" . number_format(fake()->numberBetween(40000, 200000),0, null, ","),
            "employer_id" => fake()->numberBetween(1,5)
        ];
    }
}
