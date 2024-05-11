<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PublicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'contenu' => ['required', 'string'],
            'nb_like' => ['required', 'numeric'],
            'nb_commentaire' => ['required', 'numeric'],
            'image' => ['nullable'],
            'id_service' => ['nullable', 'numeric'],
            'auteur' => ['numeric'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'auteur' => Auth::user()->id,
            'nb_like' => 0,
            'nb_commentaire' => 0,
        ]);
    }
}
