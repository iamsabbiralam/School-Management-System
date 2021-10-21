<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ResultRequest extends FormRequest
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
            'student_id' => [
                'required',
            ],

            'subject_id' => [
                'required',
            ],

            'marks.*' => [
                'required',
            ],

            'class_id' => [
                'required',
            ]
        ];
    }

    public function messages() {

        return [
            'student_id.required' => "Student should be selected.",
            'class_id.required' => "Class should be selected.",
            'marks.*.required' => "Marks field should be required.",
        ];
    }
}
