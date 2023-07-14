<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;

    protected $table = 'audios';

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


    
    // test con tinker: OK
    // devuelve el usuario que creó el audio
    public function user()
    {
        return $this->belongsTo(User::class);
    }



    // test con tinker: OK
    // devuelve el proyecto al que pertenece el audio
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }



    // test con tinker: OK
    // devuelve los eventos del audio
    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }



    // test con tinker: OK
    // devuelve los samples del audio
    public function samples()
    {
        return $this->hasMany(Sample::class);
    }


}
