<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpsertProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
            //Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array//<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:500',
            'description' => 'required|max:1500',
            'amount' => 'required|integer|min:0',
            'price' => 'required|numeric|between:0,999999.99',
            'image' => 'nullable|image|mimes:jpg,png'
        ];
    }
}
