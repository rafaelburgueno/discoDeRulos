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





    // devuelve el usuario que creó o que administra el proyecto
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // usando la tabla 'colaboradores' devuelve los user colaboradores del proyecto
    /*public function colaboradores()
    {
        return $this->belongsToMany(User::class, 'colaboradores');
    }*/
    // o
    public function colaboradores()
    {
        return $this->hasMany(Colaborador::class);
    }

    






}
