<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:10'], 
            'email' => ['required', 'email'], 
            'password' => ['required', 'min:8'],
        ];
    }

    public function messages(): array 
    {
        return [
            'name.required' => 'Your name is required.', 
            'name.min' => 'Name should be at least 3 characters.', 
            'name.max' => 'Name cannot exceed 10 characters.', 
            'email.required' => 'Your email is required.', 
            'email.email' => 'Not a valid email address.', 
            'password.required' => 'Password is required.', 
            'password.min' => 'Password should be at least 8 characters',
        ];
    }
}
