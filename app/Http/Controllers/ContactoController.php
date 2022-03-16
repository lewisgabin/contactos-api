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
    public function listarContactos(ListarContactosRequest $request){
       return ContactoResource::collection(Contacto::all());
    }

    public function crear(CrearRequest $request){

    }
}
