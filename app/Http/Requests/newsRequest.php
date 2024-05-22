<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class newsRequest extends FormRequest
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
            'title' => 'required|max:100',
            'text' => 'required|min:200',
            'file' => 'required|mimes:jpeg,png,jpg,pdf,jfif,gif'
        ];
    }
    public function messages(){
        return [
            'title.required' =>  'Введите тему статьи.',
            'title.max' =>  'Длина темы не должно превышать 100 символов.',
            'text.required' =>  'Введите текст статьи.',
            'title.min' =>  'Статья должна содержать минимум 200 символов.',
            'file.required' => 'Загрузите фото.',
            'file.mimes'=> 'Данный файл не поддерживается.',
        ];
    }
}

