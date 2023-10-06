<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePadron extends FormRequest
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
            'padron_afiliado' => 'required|max:20',
            'padron_apellido' => 'required|max:60',
            'padron_nombres' => 'required|max:60',
            'padron_documento' => 'required|numeric',
            'padron_cuil' => 'required|max:11|min:11',
            'padron_titular' => 'required|numeric',
            'padron_fechanac' => 'required'
        ];
    }
}
