<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
            'title' => ['required', 'Min:3', Rule::unique('posts')->ignore($this->id)],
            'description' => ['required', 'Min:10'],
            'user_id'=>['required','exists:users,id'],
            'fileUpload'=>['nullable','image','mimes:jpg,png']
        ];
    }
}
