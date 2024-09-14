<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Artist;
use App\Models\Exhibit;
use App\Models\Gallery;
use App\Models\Piece;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();

        User::factory(3)->create();

        Gallery::factory(6)->has(Exhibit::factory(1))->create();

        Artist::factory(3)->create();

        Piece::factory()->create([
            "artist_id" => 1,
            "exhibit_id" => 1,
        ]);
        Piece::factory()->create([
            "artist_id" => 1,
            "exhibit_id" => 2,
        ]);
        Piece::factory()->create([
            "artist_id" => 1,
            "exhibit_id" => 3,
        ]);
        Piece::factory()->create([
            "artist_id" => 1,
            "exhibit_id" => 4,
        ]);
        Piece::factory()->create([
            "artist_id" => 2,
            "exhibit_id" => 1,
        ]);
        Piece::factory()->create([
            "artist_id" => 2,
            "exhibit_id" => 2,
        ]);
        Piece::factory()->create([
            "artist_id" => 2,
            "exhibit_id" => 3,
        ]);
        Piece::factory()->create([
            "artist_id" => 2,
            "exhibit_id" => 4,
        ]);
        Piece::factory()->create([
            "artist_id" => 2,
            "exhibit_id" => 5,
        ]);
        Piece::factory()->create([
            "artist_id" => 3,
            "exhibit_id" => 1,
        ]);
        Piece::factory()->create([
            "artist_id" => 3,
            "exhibit_id" => 2,
        ]);
        Piece::factory()->create([
            "artist_id" => 3,
            "exhibit_id" => 4,
        ]);
        Piece::factory()->create([
            "artist_id" => 3,
            "exhibit_id" => 5,
        ]);
        Piece::factory()->create([
            "artist_id" => 3,
            "exhibit_id" => 6,
        ]);
    }
}
