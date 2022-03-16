<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contacto\CrearRequest;
use App\Http\Resources\ContactoResource;
use App\Models\Contacto;
use App\Models\Telefono;
use App\Models\Direccion;


use App\Http\Requests\Contacto\ListarContactosRequest;

class ContactoController extends Controller
{
    public function listarContactos(ListarContactosRequest $request)
    {
        return ContactoResource::collection(Contacto::all());
    }

    public function crear(CrearRequest $request)
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
        return new ContactoResource($contacto);
    }
}
