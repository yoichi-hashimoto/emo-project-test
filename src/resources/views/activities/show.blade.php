@extends('layouts.app')

@section('title', $activity->title . ' | 活動報告')

@php use Illuminate\Support\Facades\Storage; @endphp

@section('content')
<section class="section section--tint">
    <div class="container section__inner section__narrow">
        <article class="card">
            {{-- サムネイル --}}
            @if($activity->thumbnail_path)
                <img src="{{ Storage::url($activity->thumbnail_path) }}"
                     alt="" class="hero__photo" style="margin-bottom:16px;">
            @endif

            <h1 class="section__title">{{ $activity->title }}</h1>
            <p class="card__meta">
                {{ optional($activity->published_at ?? $activity->created_at)->format('Y-m-d') }}
                @if($activity->event)
                    ／ {{ $activity->event->title }}
                @endif
            </p>

            <div class="card__text">
                {!! nl2br(e($activity->body)) !!}
            </div>

            {{-- いいねボタン --}}
            <div style="margin-top:16px;">
                @auth
                    <form action="{{ $userLike
                        ? route('activities.unlike', $activity)
                        : route('activities.like', $activity) }}"
                          method="POST" style="display:inline;">
                        @csrf
                        @if($userLike)
                            @method('DELETE')
                        @endif
                        <button type="submit" class="btn btn--ghost">
                            👍 {{ $activity->likes->count() }}
                            {{ $userLike ? 'いいね解除' : 'いいね' }}
                        </button>
                    </form>
                @else
                    <span>👍 {{ $activity->likes->count() }} いいね</span>
                    <span style="margin-left:8px;">※いいねするにはログインが必要です</span>
                @endauth
            </div>
        </article>

        {{-- コメント一覧 --}}
        <section style="margin-top:32px;">
            <h2 class="section__subtitle">コメント</h2>

            @foreach($activity->comments as $comment)
                <div class="card" style="margin-bottom:8px;">
                    <p class="card__meta">
                        {{ $comment->user->name }} ／ {{ $comment->created_at->format('Y-m-d H:i') }}
                    </p>
                    <p class="card__text">{{ $comment->body }}</p>
                </div>
            @endforeach

            {{-- コメントフォーム --}}
            @auth
                <form action="{{ route('activities.comment', $activity) }}"
                      method="POST" class="form" style="margin-top:16px;">
                    @csrf
                    <div class="form__group">
                        <label for="body">コメントを書く</label>
                        <textarea id="body" name="body" rows="3" required>{{ old('body') }}</textarea>
                        @error('body')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form__group">
                        <button type="submit" class="btn btn--primary">送信</button>
                    </div>
                </form>
            @else
                <p>※コメントするにはログインが必要です。</p>
            @endauth
        </section>
    </div>
</section>
@endsection
