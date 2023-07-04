<?php

namespace App\Http\Requests\Students;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'email'=>'required|email|unique:users,email,'.$this->id,
            'password'=>'required|confirmed',
            'phone'=>'required|unique:users,phone,'.$this->id,
            'address'=>'nullable',
            'image'=>'image',
            'date_of_birth'=>'required|date',
            'gender'=>'required',
            'uid'=>'required',
            'semester_id'=>'required',
            'class_id'=>'required',
            'have_brother'=>'nullable',
            'have_discount'=>'nullable',
            'uid_image'=>'image',
            'certification_image'=>'image',
        
        ];
    }
}
