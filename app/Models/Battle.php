<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Battle extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'character_1_id', 'vote_1', 'character_2_id', 'vote_2', 'date_start', 'date_end'];

    public function character1()
    {
        return $this->belongsTo(Character::class, 'character_1_id');
    }

    public function character2()
    {
        return $this->belongsTo(Character::class, 'character_2_id');
    }
}
