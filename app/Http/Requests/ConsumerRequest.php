<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsumerRequest extends FormRequest
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
                  'groupId' => 'required|int',
                  'login' => 'required|min:3|string|max:50',
                  'password' => 'required|string|min:4',
                  'email' => 'required|email|min:6'
        ];
    }
}
