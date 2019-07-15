<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\LowerCase;
class CustomRequest extends FormRequest
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
            'name'=>['required','string','max:5','numchar',new LowerCase],
            'id'=>['integer']
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'custom name is required',
            'name.max'=>'the :attribute length over,max 5',
        ];
    }
}
