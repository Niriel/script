<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // user_id is not part of the request. It is added by the controller itself, taken from Auth.
            // We do not want anyone to impersonate someone else.
            'title' => 'required|max:255',
            'categories' => 'nullable',
            'content' => 'required',
            'is_premium' => 'nullable',
            'image_file' => [
                'nullable',
                'max:100000', // kilobytes, so 0.1 MB.
                'extensions:jpg,jpeg,png',
                'mimes:jpg,bmp,png',
            ]
        ];
    }
}
