<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[\pL\s\-\.]+$/u', // Only letters, spaces, hyphens, dots
            ],
            'email' => ['required', 'email:rfc,dns', 'unique:users,email'],
            'phone' => ['required', 'regex:/^[0-9\-\+\s\(\)]+$/', 'unique:users,phone'],
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/', // at least one lowercase
                'regex:/[A-Z]/', // at least one uppercase
                'regex:/[0-9]/', // at least one digit
                'regex:/[@$!%*#?&]/', // at least one special char
            ],
            'terms' => 'accepted',
            'role' => 'required|in:Expert,Applicant',
        ];
    }

    public function messages(): array
    {
        return [
            'name.regex' => 'Name may only contain letters, spaces, hyphens, and periods.',
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'email' => $this->email ? trim(strtolower($this->email)) : null,
            'name' => $this->name ? trim($this->name) : null,
            'phone' => $this->phone ? preg_replace('/\s+/', '', $this->phone) : null,
        ]);
    }
}
