<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'audio_id',
        'descripcion',
        'marca',
    ];


    // test con tinker: OK
    // devuelve el audio al que pertenece el evento
    public function audio()
    {
        return $this->belongsTo(Audio::class);
    }




}
