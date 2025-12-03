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
            'type'         => ['required', 'string', 'in:plogging,nature,farm,other'],
            'description'  => ['nullable', 'string'],
            'place'        => ['nullable', 'string', 'max:100'],
            'scheduled_at' => ['nullable', 'date'],
            'capacity'     => ['nullable', 'integer', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'タイトルは必須です',
            'type.required'  => '活動種別を選択してください',
            'scheduled_at.date' => '日時は日付形式で入力してください',
        ];
    }
}
