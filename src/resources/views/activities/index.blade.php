@extends('layouts.app')

@section('title', '活動報告 | 町田emoプロジェクト')

@php
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Str;

    // カテゴリ別のデフォルトサムネ（無ければここで補う）
    $defaultThumbs = [
        'plogging' => 'images/events/plogging.jpg',
        'nature'   => 'images/events/nature.jpg',
        'farm'     => 'images/events/farm.jpg',
        'other'    => 'images/events/other.jpg',
    ];
@endphp

@section('content')
<section class="section">
    <div class="container section__inner">
        <div class="section__header">
            <h2 class="section__title">活動報告</h2>
            @auth
                @if(auth()->user()->isMember())
                    <a href="{{ route('activities.create') }}" class="btn btn--primary">
                        活動報告を投稿する
                    </a>
                @endif
            @endauth
        </div>

        @if($activities->isEmpty())
            <p>まだ活動報告はありません。</p>
        @else
            <div class="grid grid--2">
                @foreach($activities as $activity)
                    @php
                        // サムネイルのURL決定（個別画像があれば優先）
                        if ($activity->thumbnail_path) {
                            $thumbUrl = Storage::url($activity->thumbnail_path);
                        } else {
                            $thumbUrl = asset(
                                $defaultThumbs[$activity->category] ?? 'images/events/default.jpg'
                            );
                        }
                    @endphp

                    <article class="card activity-card">
                        {{-- クリック全体をリンクにしたい場合は <a> でラップ --}}
                        <a href="{{ route('activities.show', $activity) }}" class="activity-card__link">
                            <div class="activity-card__thumb">
                                <img src="{{ $thumbUrl }}" alt="" loading="lazy">
                            </div>

                            <div class="activity-card__body">
                                <h3 class="card__title">
                                    {{ $activity->title }}
                                </h3>

                                <p class="card__meta">
                                    {{ optional($activity->published_at ?? $activity->created_at)->format('Y-m-d') }}
                                    @if($activity->event)
                                        ／ {{ $activity->event->title }}
                                    @endif
                                </p>

                                <p class="card__text">
                                    {{ Str::limit(strip_tags($activity->body), 80) }}
                                </p>

                                <p class="card__meta">
                                    👍 {{ $activity->likes_count }} ／ 💬 {{ $activity->comments_count }}
                                </p>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection
