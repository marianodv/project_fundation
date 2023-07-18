<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovimientoStoreRequest extends FormRequest
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
            'monto' => ['required', 'numeric', 'between:-999999.99,999999.99'],
            'descripcion' => ['required', 'string', 'max:40'],
            'alumno_id' => ['nullable','numeric'],
            'actividad_id' => ['required', 'numeric'],
            'concepto_id' => ['required', 'numeric'],
            'caja_id' => ['required', 'numeric'],
        ];
    }
}
