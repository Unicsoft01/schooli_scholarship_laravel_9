<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applications>
 */
class ApplicationsFactory extends Factory
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
            'sch_id' => rand(0,20),
            'user_id' => rand(0,20), //will use my user id's
            'payable' => fake()->text(),
            'pmt_status' => fake()->text(),
            'status' => fake()->text(),
            // $faker->sentence(5)
        ];
    }
}
