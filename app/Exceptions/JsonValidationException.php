<?php

namespace App\Exceptions;
use Illuminate\Contracts\Validation\Validator;
use Exception;

class JsonValidationException extends Exception
{

    protected $validator;
    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function report()
    {
        return false;
    }

    public function render($request)
    {
        return  response()->json([
            'mensaje' => 'Error en la validacion de los datos',
            'error' => $this->validator->errors()
        ],442);
    }
}
