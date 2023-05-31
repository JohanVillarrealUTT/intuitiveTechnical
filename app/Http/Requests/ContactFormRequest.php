<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'phone_number' => 'required|numeric|regex:/^[0-9]{10}$/',
            'email' => 'required|email',
            'time_of_experience' => 'required',
            'name_of_stalls' => 'required',
            'english_level' => 'required',
        ];
    }
}
