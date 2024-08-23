<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Piece>
 */
class PieceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(7, true),
            'description' => fake()->text(255),
            'price' => fake()->randomFloat(3, 100, 2000000),
            //'artist_id' => Artist::factory(),
            //'exhibit_id' => Exhibit::factory()
        ];
    }
}
