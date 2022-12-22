<?php

namespace Database\Factories;

use App\Models\Character;
use App\Models\Manga;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Character>
 */
class CharacterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Character::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'manga_id' => Manga::all()->random(),
            'name' => fake()->name(),
            'biography' => fake()->text(),
            'picture_path' => fake()->imageUrl(640, 480, 'characters', true),
        ];
    }
}
