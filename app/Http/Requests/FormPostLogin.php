<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormPostLogin extends FormRequest
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
            //
            'username'=> 'required|max:60',
            'password'=> 'required'
        ];
    }
    public function messages(){
        return[
        'username.required'=>'vui long nhap username',
        'username.max'=>'username ko vuot qua :max ky tu',
        'password.required'=>'vui long nhap mat khau'
        ];
    }
}
