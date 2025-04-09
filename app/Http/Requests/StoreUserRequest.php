<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'dob' => 'nullable|date',
            'phone' => 'nullable|string|unique:users,phone',
            'account' => 'nullable|numeric|min:0',
            'profile_photo_path' => 'nullable|string|max:2048',
            'role' => 'required|string|in:admin,user',
        ];
    }

    // public function messages(): array
    // {
    //     return [
    //         'name.required' => 'The name field is required.',
    //         'email.required' => 'The email field is required.',
    //         'email.unique' => 'The email has already been taken.',
    //         'password.required' => 'The password field is required.',
    //         'password.min' => 'The password must be at least 8 characters.',
    //         'password.confirmed' => 'The password confirmation does not match.',
    //         'phone.unique' => 'The phone number has already been taken.',
    //         'dealer_number.unique' => 'The dealer number has already been taken.',
    //         'category_id.exists' => 'The selected category is invalid.',
    //     ];
    // }
}
