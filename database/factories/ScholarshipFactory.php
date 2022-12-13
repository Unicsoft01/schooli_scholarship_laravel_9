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
            'name' => fake()->text(),
            'sponsor' =>  fake()->name(),
            'type' => fake()->text(),
            'about' => fake()->text(255),
            'country' => fake()->sentence(1),
            'cert' => fake()->text(5),
            'price' => rand(10000,100000),
            'slots' => rand(2,100),
            'status' => fake()->text(),
            'requirement' => fake()->text(),
        ];
    }
}
// country	requirement	about	price	slots	status	created_at	updated_at	

