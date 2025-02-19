<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users,email,' . $this->user()->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'profile_img' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ];
    }
}
