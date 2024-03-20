<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class adminuserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phone_no' => 'required|numeric|digits:10',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png',
            'email' => 'required|email|unique:adminusers,email',
            'password' => 'required|string|min:8', // Assuming it's a string field, not email
            'role' => 'required|in:masteradmin,user', // Assuming you meant 'in', not 'enum'
            // Add more validation rules as needed
        ];
    }
}
