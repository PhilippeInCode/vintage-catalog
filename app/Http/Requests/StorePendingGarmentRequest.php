<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePendingGarmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        $currentYear = date('Y');

        return [
            'name'               => ['required', 'string', 'max:150'],
            'description'        => ['nullable', 'string'],
            'origin_country'     => ['nullable', 'string', 'max:100'],
            'production_year'    => ['nullable', 'integer', 'min:1900', "max:{$currentYear}"],
            'production_period'  => ['nullable', 'string', 'max:50'],
            'usage_type'         => ['required', 'in:military,formal,work,sport'],
            'usage_year'         => ['nullable', 'integer', 'min:1900', "max:{$currentYear}"],
            'used_country'       => ['nullable', 'string', 'max:100'],
            'materials'          => ['nullable', 'string'],
            'photos'             => ['required', 'array', 'min:1', 'max:10'],
            'photos.*'           => ['required', 'url'],
        ];
    }
}
