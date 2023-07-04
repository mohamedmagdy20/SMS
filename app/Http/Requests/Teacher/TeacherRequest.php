<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            //
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$this->user,
            'phone'=>'required|unique:users,phone,'.$this->user,
            'password'=>'required|confirmed',
            'image'=>'image',
            'address'=>'required',
            'tips'=>'numeric|nullable'
        ];
    }
}
