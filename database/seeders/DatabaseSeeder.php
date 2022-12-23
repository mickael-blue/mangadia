<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Battle;
use App\Models\User;
use App\Models\Manga;
use App\Models\Category;
use App\Models\Character;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $one_piece = Manga::factory()
            ->hasCategories(1, [
                'name' => 'Pirate',
            ])
            ->create([
                'title' => 'One Piece',
            ]);
        $naruto = Manga::factory()
            ->hasCategories(1, [
                'name' => 'Ninja',
            ])
            ->create([
                'title' => 'Naruto',
            ]);
        $bleach = Manga::factory()
            ->hasCategories(1, [
                'name' => 'Monstre',
            ])
            ->create([
                'title' => 'Bleach',
            ]);
        $dragonball = Manga::factory()
            ->hasCategories(1, [
                'name' => 'Art Martiaux',
            ])
            ->create([
                'title' => 'DragonBall',
            ]);

        $luffy = Character::factory()
            ->for($one_piece)
            ->create([
                'name' => 'Luffy D. Monkey',
                'picture_path' => 'characters/luffy.webp'
            ]);
        $zoro = Character::factory()
            ->for($one_piece)
            ->create([
                'name' => 'Zoro Ronoroa',
                'picture_path' => 'characters/zoro.jpg'
            ]);
        Character::factory()
            ->for($naruto)
            ->create([
                'name' => 'Naruto Uzumaki',
                'picture_path' => 'characters/naruto.png'
            ]);
        Character::factory()
            ->for($naruto)
            ->create([
                'name' => 'Sasuke Uchiha',
                'picture_path' => 'characters/sasuke.webp'
            ]);
        Character::factory()
            ->for($bleach)
            ->create([
                'name' => 'Ichigo Kurosaki',
                'picture_path' => 'characters/ichigo.jgp'
            ]);
        Character::factory()
            ->for($bleach)
            ->create([
                'name' => 'Zaraki Kenpachi',
                'picture_path' => 'characters/zaraki.webp'
            ]);
        Character::factory()
            ->for($dragonball)
            ->create([
                'name' => 'Sangoku',
                'picture_path' => 'characters/sangoku.webp'
            ]);
        Character::factory()
            ->for($dragonball)
            ->create([
                'name' => 'Vegeta',
                'picture_path' => 'characters/vegeta.webp'
            ]);

        User::factory()
            ->create([
                'name' => 'Admin',
                'email' => 'admin@mangadia.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' // password
            ]);

        Battle::factory()->create();

    }
}
