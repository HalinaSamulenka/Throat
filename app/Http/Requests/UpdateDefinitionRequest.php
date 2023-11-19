<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDefinitionRequest extends FormRequest
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
        return [
            'word_id' => ['required'],
            'word_type_id'=> ['required'],
            'definition'=> ['required'],
            'appropriate'=> ['nullable'],
            'rating_id'=> ['required'],
            'review'=> ['nullable'],
        ];
    }
}
