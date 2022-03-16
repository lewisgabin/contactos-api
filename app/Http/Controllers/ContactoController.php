<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contacto\CrearRequest;
use App\Http\Resources\ContactoResource;
use App\Models\Contacto;

use App\Http\Requests\Contacto\ListarContactosRequest;

class ContactoController extends Controller
{
    public function listarContactos(ListarContactosRequest $request)
    {

        return ContactoResource::collection(Contacto::buscar($request->valor));
    }

    public function crear(CrearRequest $request)
    {
        $contacto = new Contacto();
        $contacto = $contacto->crearContactos($request);
        return new ContactoResource($contacto);
    }
}
