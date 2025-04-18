<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            "title" => ["required", "min:3"],
            "description" => ["required", "min:5"],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'category' => ['nullable' ,'exists:categories,id'],
            'tags' => ['array', 'min:1','exists:tags,id']
        ];
    }
}
