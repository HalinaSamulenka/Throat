<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateWordTypeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $wordTypeId =$this->route('wordtype');
        return [
            'name' => [
                'required',
                Rule::unique('word_types', 'name')->ignore($wordTypeId),
                'min:0',
                'max:32',
            ],
            'code' => ['required', 'max:2'],

        ];
    }
}
