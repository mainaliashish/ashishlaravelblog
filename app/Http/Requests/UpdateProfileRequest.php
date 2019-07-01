<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name'         => 'required|max:100|min:8',
            'email'        => 'required|email',
            'facebook'     => 'required|url',
            'youtube'      => 'required|url'
        ];
    }


    /**
        Overriding error messages
    */

    public function messages()
    {
    return [
        'name.required'        => 'Name cannot be blank!',
    ];
    }
}
