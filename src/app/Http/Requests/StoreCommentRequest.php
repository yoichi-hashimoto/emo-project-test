<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check(); // コメントはログイン必須
    }

    public function rules(): array
    {
        return [
            'activities_id' => ['required', 'exists:activities,id'],
            'body'            => ['required', 'string', 'max:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'body.required' => 'コメントを入力してください',
        ];
    }
}
