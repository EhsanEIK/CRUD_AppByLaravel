<?php

namespace App\Http\Requests;

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
            'department_id' => 'required',
            'name'          => 'required',
            'roll'          => 'nullable',
            'email'         => 'nullable|unique:students',
            'phone'         => 'nullable',
            'address'       => 'nullable',
            'imgPath'       => 'nullable',
        ];
    }
}
