<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'bpm',
        'user_id',
        'public',
    ];




    // test con tinker: OK
    // devuelve el usuario que creó o que administra el proyecto
    public function user()
    {
        return $this->belongsTo(User::class);
    }



    // test con tinker: OK
    //devuelve un array con los usuarios que colaboran en el proyecto sin incluir los registros de la tabla 'colaboradores'
    public function colaboradores()
    {
        //return $this->hasMany(Colaborador::class);
        return $this->belongsToMany(User::class, 'colaboradors');
    }

    
    // test con tinker: OK
    // devuelve los audios del proyecto
    public function audios()
    {
        return $this->hasMany(Audio::class);
    }





}
