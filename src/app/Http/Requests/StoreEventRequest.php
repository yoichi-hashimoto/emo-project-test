<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->isMember();
    }

    public function rules(): array
    {
        return [
            'title'        => ['required', 'string', 'max:100'],
            'type'         => ['required', 'string', 'in:プロギング,自然観察会,農業体験,その他'],
            'description'  => ['nullable', 'string'],
            'place'        => ['nullable', 'string', 'max:100'],
            'scheduled_at' => ['nullable', 'date'],
            'capacity'     => ['nullable', 'integer', 'min:1'],
            'application_path' => ['nullable', 'url', 'max:255'], // 追加部分
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'タイトルは必須です',
            'type.required'  => '活動種別を選択してください',
            'scheduled_at.date' => '日時は日付形式で入力してください',
            'capacity.integer'  => '定員は整数で入力してください',
            'capacity.min'      => '定員は1以上で入力してください',
            'application_path.url' => '申し込みフォームURLは有効なURL形式で入力してください', // 追加部分
        ];
    }
}
