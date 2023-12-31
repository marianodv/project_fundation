<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoStoreRequest extends FormRequest
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
            'nombre' => ['required', 'string', 'max:40'],
            'apellido' => ['required', 'string', 'max:40'],
            'nacimiento' => ['required', 'date'],
            'mail' => ['required', 'string', 'max:60'],
            'dni' => ['required', 'string', 'regex:/^[0-9]+$/' ,'max:10'],
            'telefono' => ['required', 'string', 'max:15'],
        ];
    }
}
