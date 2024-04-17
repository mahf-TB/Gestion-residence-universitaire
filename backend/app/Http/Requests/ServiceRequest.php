<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ServiceRequest extends FormRequest
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
            'type_service' => ['required', 'string', 'max:255'],
            'nom_service' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'tarifs' => ['required','numeric'],
            'disponible' => ['required'],
            'image' => ['nullable'],
            'id_user' => ['numeric'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'id_user' => Auth::user()->id,
        ]);
    }
}
