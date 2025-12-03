<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'    => ['required', 'string', 'max:50'],
            'email'   => ['required', 'email', 'max:100'],
            'subject' => ['nullable', 'string', 'max:100'],
            'body'    => ['required', 'string', 'max:2000'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'  => 'お名前は必須です',
            'email.required' => 'メールアドレスは必須です',
            'body.required'  => 'お問い合わせ内容を入力してください',
        ];
    }
}
