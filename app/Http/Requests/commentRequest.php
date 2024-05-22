<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class commentRequest extends FormRequest
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
            'name' => 'required|max:100',
            'email' => 'required|email',
            'message.php' => 'required|max:800|min:20'
        ];
    }
    public function messages(){
        return [
            'name.required' =>  'Введите имя.',
            'name.max' =>  'Имя не должно быть длинее 100 символов.',
            'email.required' =>  'Введите адрес эл-почты.',
            'email.email' =>  'Неправильный формат адреса электронной почты',
            'message.required' => 'Введите текст комментария.',
            'message.max'=> 'Длина комментария превышает разрешенную длину.',
            'message.min'=> 'Длина комментария должно быть длиннее 20 символов.',
        ];
    }
}
