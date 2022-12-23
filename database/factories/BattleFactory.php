<?php

namespace Database\Factories;

use App\Models\Battle;
use App\Models\Character;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Battle>
 */
class BattleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Battle::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->sentence(4),
            'character_1_id' => Character::all()->random(),
            'character_2_id' => Character::all()->random(),
            'vote_1' => fake()->randomNumber(3),
            'vote_2' => fake()->randomNumber(3),
            'date_start' => fake()->dateTimeBetween('-1 week', 'now'),
            'date_end' => fake()->dateTimeThisMonth(),
        ];
    }
}
