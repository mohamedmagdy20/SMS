<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'email'=>['required', Rule::unique('users','email')->ignore($this->route('id'))],
            'phone'=>['required', Rule::unique('users','phone')->ignore($this->route('id'))],
            'password'=>'required|confirmed',
            'image'=>'image',
            'address'=>'required',
            'tips'=>'numeric|nullable'
        ];
    }
}
