<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    use HasFactory; // Important pour activer la factory sur ce modèle

    protected $fillable = [
        'role',
        'name',
        'description',
        'image',
    ];
}
