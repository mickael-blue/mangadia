<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        Character::factory()
            ->for($one_piece)
            ->create([
                'name' => 'Luffy D. Monkey',
            ]);
        Character::factory()
            ->for($one_piece)
            ->create([
                'name' => 'Zoro Ronoroa',
            ]);
        Character::factory()
            ->for($naruto)
            ->create([
                'name' => 'Naruto Uzumaki',
            ]);
        Character::factory()
            ->for($naruto)
            ->create([
                'name' => 'Sasuke Uchiha',
            ]);
        Character::factory()
            ->for($bleach)
            ->create([
                'name' => 'Ichigo Kurosaki',
            ]);
        Character::factory()
            ->for($bleach)
            ->create([
                'name' => 'Zaraki Kenpachi',
            ]);
        Character::factory()
            ->for($dragonball)
            ->create([
                'name' => 'Sangoku',
            ]);
        Character::factory()
            ->for($dragonball)
            ->create([
                'name' => 'Vegeta',
            ]);

        User::factory()
            ->create([
                'name' => 'Admin',
                'email' => 'admin@mangadia.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' // password
            ]);
    }
}
