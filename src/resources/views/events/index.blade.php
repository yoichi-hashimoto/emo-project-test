@php
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
@endphp


@extends('layouts.app')

@section('title', 'イベント一覧 | 町田emoプロジェクト')

@section('content')
<section class="section">
    <div class="container section__inner">
        <div class="section__header">
            <h2 class="section__title">イベント一覧</h2>
            @auth
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('activities.create') }}" class="btn btn--primary">イベントを登録する</a>
                @endif
            @endauth
        </div>

        @if(session('success'))
            <div class="card" style="margin-bottom:16px; color:#1b5e20;">
                {{ session('success') }}
            </div>
        @endif

        @if($events->isEmpty())
            <p>現在予定されているイベントはありません。</p>
        @else
            <div class="grid grid--2">
                @foreach($events as $event)
                    <article class="card">
                        <h3 class="card__title">{{ $event->title }}</h3>
                        <p class="card__meta">
                            種別：{{ $event->type }} /
                            日時：{{ optional($event->scheduled_at)->format('Y-m-d H:i') ?? '未定' }}<br>
                            場所：{{ $event->place ?? '未定' }}
                        </p>
                        @if($event->description)
                            <p class="card__text">{{ Str::limit($event->description, 120) }}</p>
                        @endif
                    </article>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection
 