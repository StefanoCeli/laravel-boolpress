<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|max:30',
            'content' => 'required|min:5',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'inserire un titolo',
            'title.max' => 'inserire massimo :max caratteri',
            'content.required' => 'inserire un testo',
            'content.min' => 'inserire minimo :min caratteri',
            'category_id.exists' => 'Nessuna categoria presente con questo valore',
            'tags.exists' => 'Nessun tag presente con questo valore'
        ];
    }
}
