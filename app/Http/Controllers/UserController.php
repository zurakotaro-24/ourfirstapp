<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request) {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:10'], 
            'email' => ['required', 'email'], 
            'password' => ['required', 'min:8'],
        ], [
            'name.required' => 'Your name is required.', 
            'name.min' => 'Name should be at least 3 characters.', 
            'name.max' => 'Name cannot exceed 10 characters.', 
            'email.required' => 'Your email is required.', 
            'email.email' => 'Not a valid email address.', 
            'password.required' => 'Password is required.', 
            'password.min' => 'Password should be at least 8 characters',
        ]);

        return "Hello from the controller sht";
    }
}
