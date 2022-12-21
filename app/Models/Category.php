<?php

namespace App\Models;

use App\Models\Manga;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;

    public function mangas()
    {
        return $this->belongsToMany(Manga::class);
    }
}
