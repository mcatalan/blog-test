<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
//            'author_id' => 'required|integer|exists:authors,id', // @TODO: Uncomment this when database exists
            'title' => 'required|string|unique:posts|max:255',
            'body' => 'required|string',
        ];
    }
}
