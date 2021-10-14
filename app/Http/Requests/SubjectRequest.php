<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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
            'subjects' => [
                'required',
                Rule::unique('subjects')->ignore($this->route),
                'min:3',
                'max:100'
            ],
        ];
    }

    public function message() {

        return [
            'subjects.unique' => "Subject name should be unique."
        ];
    }
}