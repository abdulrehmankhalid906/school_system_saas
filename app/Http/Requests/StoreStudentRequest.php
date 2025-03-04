<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|min:8|string',
            'phone' => 'required',
            'parent_id' => 'nullable',
            'klass_id' => 'required',
            'section_id' => 'required',
            'monthly_fee' => 'required|numeric',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required|string'
        ];
    }
}
