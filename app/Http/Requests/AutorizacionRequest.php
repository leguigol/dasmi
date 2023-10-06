<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutorizacionRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'prestador' => 'required|not_in:Seleccione una opcion',
            'afiliado' => 'required|not_in:Seleccione una opcion',
            'fechaprescri' => 'required',
            'matricula' => 'required|numeric',            
            // 'lista' => 'required|array|min:2',   
            'practica' => [
                'required',
                'array',
                function ($attribute, $value, $fail) {
                    if (empty($value)) {
                        $fail('El campo ' . $attribute . ' debe contener al menos un registro.');
                    }
                },
            ],            
        ];
    }
    public function messages(){
        return [
            'fechaprescri.required' => 'la fecha de prescripcion es obligatoria',
            // 'lista.required' => 'La tabla de Practicas es obligatoria',
        ];
    }
}
