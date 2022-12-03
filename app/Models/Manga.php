<?php

namespace App\Models;

use App\Models\Character;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manga extends Model
{
    use HasFactory;

    public function characters()
    {
        return $this->hasMany(Character::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
