<?php

namespace app\Http\Requests;

use app\Http\Requests\Request;

class CategoriaFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //determina si el usuario esta autorizado para hacer el request
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
            //regex:/^[a-z]+$/i
        /* 'Nombre_Categoria'=>'required|max:5',
            'Descripcion'=>'required | max:5',*/
        ];
    }
}
