<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $fillable = [
        'name',
        'species',
        'primary_type',
        'weight',
        'height',
        'hp',
        'attack',
        'defense',
        'is_legendary',
        'photo'
    ];

    public static $types = [
        'Grass', 'Fire', 'Water', 'Bug', 'Normal', 'Poison', 'Electric',
        'Ground', 'Fairy', 'Fighting', 'Psychic', 'Rock', 'Ghost',
        'Ice', 'Dragon', 'Dark', 'Steel', 'Flying'
    ];
}

