<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    use HasFactory;

    protected $fillable = [
        'telefono',
    ];

    //Relacion de 1 a mucho inversa
    public function contacto()
    {
        return $this->belongsTo('App\Models\Contacto');
    }
}
