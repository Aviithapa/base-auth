<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'login'    => [
                'required',
                'string',
                'max:255',
                // Accepts either email format or phone (digits only, 7-15 length)
                'regex:/^([0-9]{7,15}|[^@\s]+@[^@\s]+\.[^@\s]+)$/',
            ],
            'password' => [
                'required',
                'string',
                'min:6',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'login.required'    => 'Email or phone number is required.',
            'login.regex'       => 'Enter a valid email or phone number.',
            'password.required' => 'Password is required.',
            'password.min'      => 'Password must be at least 6 characters.',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'login' => trim($this->input('login')),
        ]);
    }
}
