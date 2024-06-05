<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtudiantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'matricule' =>  ['nullable', 'string'],
            'nom' => ['required', 'string'],
            'prenom' => ['nullable','string'],
            'date_naissance' => ['nullable','date'],
            'sexe' => ['nullable','string','max:1'],
            'cin' => ['nullable', 'string','min:12', 'max:12'],
            'telephone' =>  ['nullable', 'string'],
            'email' => ['required','string', 'email','max:255', 'unique:etudiants'],
            'id_logement' =>  ['nullable', 'integer'],
        ];
    }
}
