<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class SchoolRequest extends FormRequest
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
        $schoolId = optional(Auth::user()->school)->id;

        return [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'district' => 'nullable|string',
            'city' => 'nullable|string',
            'phone' => 'required|string|max:255',
            'website' => 'nullable|string',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:schools,email,' . $schoolId,
            ],
            'school_logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ];
    }
}
