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

    //listar contactos
    public static function buscar($busquedad)
    {
        if ($busquedad) {
            return Contacto::where('nombre', 'like', "%$busquedad%")
                ->orWhere('apellidos', 'like', "%$busquedad%")
                ->orwhereRelation('telefonos', 'telefono', 'like', "%$busquedad%")
                ->get();
        }
        return Contacto::all();
    }

    //crear contactos

    public function crearContactos($request)
    {
        $contacto = Contacto::create($request->only(['nombre', 'apellidos']));
        //agregando telefonos
        foreach ($request->telefonos as $valor) {
            $telefono = new Telefono();
            $telefono->telefono = $valor;
            $contacto->telefonos()->save($telefono);
        }
        // agregando direcciones
        foreach ($request->direcciones as $valor) {
            $direccion = new Direccion();
            $direccion->direccion = $valor;
            $contacto->direcciones()->save($direccion);
        }

        return $contacto;
    }
}
