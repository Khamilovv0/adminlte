<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
            'title' => 'required|max:255',
            'description' => 'required',
            'video_url' => 'required|url',
        ];
    }

    public function messages(){
        return [
            'title.required' =>  'Введите тему.',
            'title.max' =>  'Длина не должно превышать 255 символов.',
            'description.required' =>  'Введите описание к видео.',
            'video_url.required' => 'Загрузите видео.',
            'video_url.url'=> 'Введите url-адрес видео.',
        ];
    }
}
