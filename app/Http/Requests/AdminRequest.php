<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'nom' => 'required',
            'prenom' => 'required',
            'username' => 'required|min:5|unique:users',
            'mail' => 'required|email|unique:users',
            'secret' => 'required|min:5',
            'confirm' => 'required|min:5|same:secret',
            'phone' => 'required|numeric',
            'adresse' => 'required',
            'postal' => 'required|min:5',
            'ville' => 'required',
        ];
    }
}
