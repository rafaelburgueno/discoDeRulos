<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'url',
        'tipo',
        'bpm',
        'proyecto_id',
        'user_id',
        'public',
    ];

}
