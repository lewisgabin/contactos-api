<?php

namespace App\Http\Requests\Contacto;

use  App\Http\Requests\BaseFormRequest;

class CrearRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'=>'required|string|max:30',
            'apellido'=>'required|string|max:40'
        ];
    }
}
