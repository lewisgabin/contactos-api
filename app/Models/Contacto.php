<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellidos',

    ];

    //Relacion de 1 a mucho
    public function telefonos()
    {
        return $this->hasMany('App\Models\Telefono');
    }

    //Relacion de 1 a mucho
    public function direcciones()
    {
        return $this->hasMany('App\Models\Direccion');
    }
}
