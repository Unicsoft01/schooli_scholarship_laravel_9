<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Scholarship>
 */
class ScholarshipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return
        [
            'name' => 'Scholarship '. fake()->text(10),
            'sponsor' =>  fake()->name(),
            'type' => fake()->sentence(2),
            'about' => fake()->sentence(8),
            'price' => rand(150,500),
            'slots' => rand(2,20),
            'status' => fake()->text(),
        ];
    }
}

