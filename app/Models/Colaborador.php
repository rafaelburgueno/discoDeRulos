<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    use HasFactory;

    protected $table = 'colaboradors';

    protected $fillable = [
        'proyecto_id',
        'user_id',
    ];



    // devuelve el nombre, el email, el id y la foto del usuario que colabora en el proyecto
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //

}
