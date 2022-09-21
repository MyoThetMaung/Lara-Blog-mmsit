<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => "required|unique:posts|min:3",
            'category' => "required|exists:categories,id",
            'photos' => 'required',                                             //checking required
            'photos.*' => 'mimes:jpg,bmp,png|file|max:5000',                    //checking file type and size
            'description' => "required|min:5",
            'featured_image' => "nullable|mimes:jpg,bmp,png|file|max:5000",
        ];
    }
}
