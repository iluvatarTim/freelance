<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpDateRequest extends FormRequest
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
            'firstname' => 'required',
            'name' => 'required',
            'username' => 'required',
            'mail' => 'mail|required',
            'address' => 'required',
            'phone' => 'numeric|required',
            'deno' => 'required',
            'siet' => 'required|numeric|size:14'
        ];
    }
}
