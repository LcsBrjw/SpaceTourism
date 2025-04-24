<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Destination extends Model
{
    use HasFactory; // Important pour activer la factory sur ce modèle


    protected $fillable = [
        "name",
        "timeTravel",
        "avgDist",
        "description",
        "imageUrl"
    ];
}
