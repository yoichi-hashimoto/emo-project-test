<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // 未ログイン申請も許可
    }

    public function rules(): array
    {
        return [
            'event_id'      => ['required', 'exists:events,id'],
            'name'          => ['required', 'string', 'max:50'],
            'email'         => ['required', 'email', 'max:100'],
            'age'           => ['nullable', 'integer', 'min:1', 'max:120'],
            'activity_type' => ['nullable', 'string', 'max:50'],
            'message'       => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'event_id.required' => 'イベントが選択されていません',
            'name.required'     => 'お名前は必須です',
            'email.email'       => 'メールアドレスの形式が正しくありません',
        ];
    }
}
