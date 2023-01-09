<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleStorePost extends FormRequest
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
            'name' => 'required|unique:roles',
            'permissions' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Ten vai tro khong duoc trong',
            'name.unique' => 'Ten vai tro da ton tai - vui long chon ten khac',
            'permissions.required' => 'Vui long chon Module va Action'
        ];
    }
}
