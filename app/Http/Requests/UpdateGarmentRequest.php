<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth; 

class UpdateGarmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'              => ['sometimes','required','string','max:150'],
            'description'       => ['sometimes','nullable','string'],
            'origin_country'    => ['sometimes','nullable','string','max:100'],
            'production_year'   => ['sometimes','nullable','integer','digits:4'],
            'production_period' => ['sometimes','nullable','string','max:100'],
            'usage_type'        => ['sometimes','required','in:military,formal,work,sport'],
            'usage_year'        => ['sometimes','nullable','integer','digits:4'],
            'used_country'      => ['sometimes','nullable','string','max:100'],
            'materials'         => ['sometimes','nullable','string'],
        ];
    }
}
