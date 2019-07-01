<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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
            'featured'     => 'required|image',
            'title'        => 'required|max:100|min:8',
            'content'      => 'required',
            'category_id'  => 'required',
            'tags'          => 'required',
        ];
    }


    /**
        Overriding error messages
    */

    public function messages()
    {
    return [
        'title.required'        => 'Enter a suitable title!',
        'content.required'      => 'Content field is required!',
        'featured.required'     => 'Image is required!',
        'category_id.required'  => 'Choose a category name!',
        'tags.required'         => 'Choose a tag name!'
    ];
    }

}
