<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BatimentRequest extends FormRequest
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
            'nom_batiment' => ['required', 'string'],
            'lot_batiment' => ['required', 'string'],
            'nb_etages' => ['required', 'integer'],
        ];
    }
}
