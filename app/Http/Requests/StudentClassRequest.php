<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentClassRequest extends FormRequest
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
            'name' => [
                "required",
                Rule::unique('student_classes')->ignore($this->route),
                'min:3',
                'max:100'
            ],
        ];
    }

    public function message() {

        return [
            'name.unique' => "Class name should be unique."
        ];
    }
}