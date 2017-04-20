<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'name' => 'required',
            'firstname' => 'required',
            'username' => 'required|min:5',
            'mail' => 'required|email|unique:users',
            'phone' => 'required|numeric',
            'deno' => 'required|min:2|alpha',
            'siret' => 'required|size:14',
            'addresse' => 'required',
        ];
    }
}
