<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'titre' => 'required|min: 3',
            'description' => 'required|min: 5'
        ];
    }

    public function messages()
    {
        return [
            'titre.required' => 'Le champ titre est requis',
            'titre.min' => 'Le champ titre doit contenir au moins 3 caracteres',
            'description.required' => 'Le champ description est requis',
            'description.min' => 'Le champ description doit contenir au moins 5 caracteres'
        ];
    }
}
