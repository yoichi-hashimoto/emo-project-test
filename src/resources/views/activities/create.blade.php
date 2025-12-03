@extends('layouts.app')

@section('title', 'イベント報告投稿 | 町田emoプロジェクト')

@section('content')
<section class="section section--tint">
    <div class="container section__inner section__narrow">
        <h2 class="section__title">イベント報告を投稿する</h2>

        @if ($errors->any())
            <div class="card" style="margin-bottom:16px; color:#c62828;">
                <ul style="margin:0; padding-left:20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('activities.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form__group">
                <label for="event_id">対象イベント</label>
                <select id="event_id" name="event_id">
                    <option value="">選択しない（単独レポート）</option>
                    @foreach($events as $event)
                        <option value="{{ $event->id }}">
                            {{ $event->scheduled_at->format('Y-m-d') }} ／ {{ $event->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form__group">
                <label for="title">タイトル<span class="badge badge--required">必須</span></label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            </div>

            <div class="form__group">
                <label for="body">本文</label>
                <textarea id="body" name="body" rows="8">{{ old('body') }}</textarea>
            </div>

            <div class="form__group">
                <label for="thumbnail">サムネイル画像</label>
                <input type="file" id="thumbnail" name="thumbnail" accept="image/*">
            </div>

            <div class="form__group">
                <label for="video_url">動画URL（任意）</label>
                <input type="url" id="video_url" name="video_url" value="{{ old('video_url') }}">
            </div>

            <div class="form__group">
                <label for="published_at">公開日</label>
                <input type="date" id="published_at" name="published_at" value="{{ old('published_at') }}">
            </div>

            <div class="form__group">
                <button type="submit" class="btn btn--primary">投稿する</button>
            </div>
        </form>
    </div>
</section>
@endsection
