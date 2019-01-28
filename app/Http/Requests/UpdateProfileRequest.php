<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'address' => 'required|string|max:191|min:15',
            'email' => 'nullable|string|email|max:255|unique:users',
            'interests'=>'nullable|string|min:15',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:100'
        ];
    }
}
