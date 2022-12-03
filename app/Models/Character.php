<?php

namespace App\Models;

use App\Models\Manga;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Character extends Model
{
    use HasFactory;

    public function manga()
    {
        return $this->belongsTo(Manga::class);
    }
}
