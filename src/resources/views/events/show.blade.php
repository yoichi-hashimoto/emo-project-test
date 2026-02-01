@extends('layouts.app')

@section('title', $event->title . '｜イベント詳細')

@section('content')
<section class="section">
    <div class="container section__inner section__narrow">

        <article class="card">
            {{-- サムネイル --}}
            <div class="event-card__group" style="margin-bottom:16px;">
                <div class="event-card__info" style="flex:1;">
            <h1 class="section__title" style="margin-bottom:8px;">
                {{ $event->title }}
            </h1>

            <p class="card__meta" style="margin-bottom:12px;">
                種別：{{ $event->type }}<br>
                日時：{{ $event->scheduled_at->format('Y-m-d H:i') }}<br>
                場所：{{ $event->place }}<br>
                定員：{{ $event->capacity ?? '未設定' }}名 
                <!-- ／申込：{{ $applicationsCount }}名 -->
            </p>
            </div>
            <div class="event-card__thumb" style="margin-bottom:16px;">
                <img src="{{ $event->category_image }}" alt="{{ $event->type }}">
            </div>
            </div>

            <hr style="border:none; border-top:1px solid #e0e8e2; margin:16px 0;">

            <h2 class="section__subtitle">イベント詳細</h2>
            <p class="card__text">
                {!! nl2br(e($event->description)) !!}
            </p>

            <div class="card__actions" style="margin-top:20px;">
                <a href="{{ $event->application_path }}"
                   class="btn btn--primary">
                    このイベントに申し込む
                </a>
            </div>
        </article>

        <a href="{{ url()->previous() }}" class="btn btn--ghost" style="margin-bottom:16px;">
            ← 戻る
        </a>

    </div>
</section>
@endsection
