<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $types = [
            'Grass', 'Fire', 'Water', 'Bug', 'Normal', 'Poison', 'Electric', 'Ground', 'Fairy',
            'Fighting', 'Psychic', 'Rock', 'Ghost', 'Ice', 'Dragon', 'Dark', 'Steel', 'Flying'
        ];

        foreach (range(1, 100) as $index) {
            DB::table('pokemons')->insert([
                'name' => $faker->unique()->word,
                'species' => $faker->word,
                'primary_type' => $types[array_rand($types)],
                'weight' => $faker->numberBetween(1, 100),
                'height' => $faker->numberBetween(1, 50),
                'hp' => $faker->numberBetween(1, 100),
                'attack' => $faker->numberBetween(1, 100),
                'defense' => $faker->numberBetween(1, 100),
                'is_legendary' => $faker->boolean,
                'photo' => $faker->imageUrl(200, 200, 'animals', true, 'pokemon'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
