<?php

namespace App\Http\Requests\Distribution;

use Illuminate\Foundation\Http\FormRequest;

class DistributionRequest extends FormRequest
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
            'user_id'=>'required',
            'subject_id'=>'required|array',
            'semester_id'=>'required',
            'class_id'=>'required|array',
            'day_id'=>'required|array',
            'time'=>'required|array'
        ];
    }
}
