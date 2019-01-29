<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRegisterRequest extends FormRequest
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
            'name'=>'required|max:50|min:5|string',
            'mobile'=>'required|email|max:191|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'gender' => 'required|string|max:1',
            'role' => 'required|string|max:20|min:3',
            'branch_id' => 'required',
        ];
    }
}
