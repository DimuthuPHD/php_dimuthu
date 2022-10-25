<?php

namespace App\Http\Requests\Representative;

use Illuminate\Foundation\Http\FormRequest;
use SebastianBergmann\Type\TrueType;

class CreateRequest extends FormRequest
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
            'first_name'    => 'required|max:100',
            'last_name'     => 'required|max:100',
            'email'         => 'required|email|unique:representatives,email',
            'mobile'        => 'required|numeric|digits:10',
            'telephone'     => 'required|numeric|digits:10',
            'joined_date'   => 'required|date',
            'comments'      => 'sometimes|max:250',
            'routes'         => 'array|exists:routes,id',
        ];
    }
}
