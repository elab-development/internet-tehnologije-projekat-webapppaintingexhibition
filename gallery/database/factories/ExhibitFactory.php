<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exhibit>
 */
class ExhibitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'description' => fake()->text(255),
            'date' => fake()->dateTimeBetween('-365days', '+365days'),
            //'gallery_id' => Gallery::factory() - zakomentarisano jer zelimo postaviti specificne vrednosti za FK
        ];
    }
}
