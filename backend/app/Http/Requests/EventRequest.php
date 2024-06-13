<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EventRequest extends FormRequest
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
            'titre' => ['required', 'string'],
            'description' => ['required', 'string'],
            'date_evenement' => ['required', 'string'],
            'lieu' => ['required', 'string'],
            'id_user' => ['required','numeric'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'id_user' => Auth::user()->id,
        ]);
    }
}

