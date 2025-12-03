<?php

// app/Http/Requests/StoreActivityRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreActivityRequest extends FormRequest
{
    public function authorize(): bool
    {
        // メンバーだけ投稿可
        return auth()->check() && auth()->user()->isMember();
    }

    public function rules(): array
    {
        return [
            'event_id'     => ['nullable', 'exists:events,id'],
            'title'        => ['required', 'string', 'max:120'],
            'body'         => ['nullable', 'string'],
            'category'     => ['nullable', 'string', 'in:plogging,nature,farm,other'],
            'thumbnail'    => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'video_url'    => ['nullable', 'url'],
            'published_at' => ['nullable', 'date'],
        ];
    }
}

