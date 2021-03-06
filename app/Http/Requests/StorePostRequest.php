<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\DocBlock\Tags\Param;

class StorePostRequest extends FormRequest
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
        return
            [
                'title' => ['required', 'Min:3', 'unique:posts'],
                'description' => ['required', 'Min:10'],
                'user_id'=>['required','exists:users,id'],
                'fileUpload'=>['required','image','mimes:jpg,png']
            ];
    }
}
