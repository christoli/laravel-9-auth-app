<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createUserRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'password' => 'required|min: 5'
        ];
    }

    public function messages()
    {
    return [
        'nom.required' => 'Le champ nom est requis',
        'nom.min' => 'Le champ nom doit contenir au moins 3 caracteres',
        'email.required' => 'Le champ email est requis',
        'email.email' => 'Le mail est incorrecte',
        'email.unique' => 'Adresse mail deja utilisée',
        'password.min' => 'Le mot de passe doit exeder 5 caracteres',
        'password.required' => 'Le mot de passe est requis'

    ];
    }
}
