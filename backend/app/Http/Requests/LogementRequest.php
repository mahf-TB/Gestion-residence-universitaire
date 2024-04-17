<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LogementRequest extends FormRequest
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
            'num_logement' => ['required', 'string', 'max:3' ],
            'type_logement' => ['required', 'string'],
            'prix' => ['required', 'numeric'],
            'status' => ['required', 'string', Rule::in(['libre', 'occuper', 'reserve', 'en_maintenance'])],
            'image' => ['nullable'],
            'id_batiment' => ['required', 'integer'],
        ];
    }
}
