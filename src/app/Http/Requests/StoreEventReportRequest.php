<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventReportRequest extends FormRequest
{
    public function authorize(): bool
    {
        // メンバーだけ投稿できる
        return auth()->check() && auth()->user()->isMember();
    }

    public function rules(): array
    {
        return [
            'event_id'       => ['nullable', 'exists:events,id'],
            'title'          => ['required', 'string', 'max:120'],
            'body'           => ['nullable', 'string'],
            'thumbnail'      => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'video_url'      => ['nullable', 'url'],
            'published_at'   => ['nullable', 'date'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'    => 'タイトルは必須です',
            'thumbnail.image'   => 'サムネイルは画像ファイルを選択してください',
            'video_url.url'     => '動画URLの形式が正しくありません',
            'published_at.date' => '公開日は日付形式で入力してください',
            'thumbnail.max'     => 'サムネイルは10MB以内でアップロードしてください',
        ];
    }
}
