<?php

namespace Extractora\Http\Requests\terceros;

use Illuminate\Foundation\Http\FormRequest;

class terceroCreateRequest extends FormRequest
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
            //    'nit' => 'required|unique:grupos', 
        ];
    }
}
