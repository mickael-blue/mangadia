<?php

namespace App\Models;

use App\Models\Character;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manga extends Model
{
    use HasFactory;

    // protected $fillable = ['title'];

    public function characters()
    {
        return $this->hasMany(Character::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
