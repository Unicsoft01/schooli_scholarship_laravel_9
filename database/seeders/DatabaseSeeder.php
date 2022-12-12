<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\Scholarship::factory(20)->state(new Sequence(
        //     ['status' => 'open'],
        //     ['status' => 'closed'],
        // ))->create();
$price = \App\Models\Scholarship::all()->random()->price;
        \App\Models\Applications::factory(20)->
        state(new Sequence(
            fn ($sequence) => ['payable' => $price],
        ))->
        state(new Sequence(
            ['pmt_status' => 'paid'],
            ['pmt_status' => 'pending'],
            ['pmt_status' => 'verified'],
            ['pmt_status' => 'not_yet_paid'],
        ))->state(new Sequence(
            ['status' => 'approved'],
            ['status' => 'pending'],
            ['status' => 'declined'],
        ))->create();

// 'payable' => fake()->text(),
// 'pmt_status' => fake()->text(),
// 'status' => fake()->text(),




        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
