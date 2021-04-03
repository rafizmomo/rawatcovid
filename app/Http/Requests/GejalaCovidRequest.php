<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GejalaCovidRequest extends FormRequest
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
            'gejala' => 'required|string|max:255',
            'pertanyaan' => 'required|string',
            'bobot' => 'required|integer|min:1|max:5',
        ];
    }
}
