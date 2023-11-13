<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnniversaryRequest extends FormRequest
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

            'anniversary_date' => 'required|date',
            'anniversary_type' => 'required|integer|min:0|max:2',
            'importance' => 'required|integer|min:0|max:3',
        ];
    }
}
