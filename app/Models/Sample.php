<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    use HasFactory;

    protected $fillable = [
        'audio_id',
        'marca_de_inicio',
        'marca_de_fin',
    ];


    // test con tinker: OK
    // devuelve el audio al que pertenece el sample
    public function audio()
    {
        return $this->belongsTo(Audio::class);
    }

}
