<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'El :attribute es obligatorio.',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'Titulo',
        ];
    }

}
