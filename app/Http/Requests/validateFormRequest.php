<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateFormRequest extends FormRequest
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
            'nom' => 'required|min: 3',
            'email' => 'required|email'
        ];
    }

    public function messages()
    {
    return [
        'nom.required' => 'Le champ nom est requis',
        'nom.min' => 'Le champ nom doit contenir au moins 3 caracteres',
        'email.required' => 'Le champ email est requis',
        'email.email' => 'Le mail est incorrecte'
    ];
    }
}
