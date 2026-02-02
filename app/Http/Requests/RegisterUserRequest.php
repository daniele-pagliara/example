<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'surname' => 'required|string|max:255',
            'cf' => 'required|string|size:16|unique:users,cf',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20|unique:users,phone',
        ];
    }
}
