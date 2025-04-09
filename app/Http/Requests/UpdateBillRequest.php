<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBillRequest extends FormRequest
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
            'title' => 'sometimes|string|max:255',
            'bill_number' => 'sometimes|string|max:255',
            'details' => 'nullable|string',
            'amount' => 'sometimes|numeric',
            'favorite' => 'nullable|boolean',
            'category_id' => 'sometimes|exists:categories,id',
            // 'user_id' => 'sometimes|exists:users,id',
            'image' => 'nullable|string',
        ];
    }
}
