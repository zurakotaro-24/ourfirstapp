<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'loginname' => ['required', 'min:3', 'max:10'], 
            'loginpassword' => ['required', 'min:8'],
        ];
    }

    public function messages(): array
    {
        return [
            'loginname.required' => 'Name is required to login.', 
            'loginname.min' => 'Name should be at least 3 characters.', 
            'loginname.max' => 'Name should not exceed 10 characters.', 
            'loginpassword.required' => 'Password is required.', 
            'loginpassword.min' => 'Password should be at least 8 characters.'
        ];
    }
}
