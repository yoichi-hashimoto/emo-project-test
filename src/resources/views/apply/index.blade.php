@extends('layouts.app')

@section('title','活動申し込み')

@section('content')
<section class="section">
    <div class="container section__inner section__narrow">
        <h1 class="section__title">活動申し込み</h1>
        <p class="section__lead">
            参加してみたい方は、下記のイベント一覧から参加したいイベントを選び、
            フォームよりお申し込みください。
        </p>

        {{-- エラーメッセージ --}}
        @if($errors->any())
            <div class="card" style="margin-bottom:16px; color:#c0392b;">
                <ul style="margin:0; padding-left:20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- 成功メッセージ --}}
        @if(session('success'))
            <div class="card" style="margin-bottom:16px; color:#2c662d;">
                {{ session('success') }}
            </div>
        @endif

        {{-- 開催予定イベント一覧 --}}
        <h2 class="section__subtitle">開催予定のイベント</h2>

        @if($events->isEmpty())
            <p>現在、開催予定のイベントはありません。</p>
        @else
            <div class="events-grid" style="margin-bottom:32px;">
                @foreach($events as $event)
                    <article class="card card--link">
                        <div class="event-card__thumb">
                            <img src="{{ $event->category_image }}"
                                 alt="{{ $event->type ?? 'event' }}">
                        </div>
                        <h3 class="card__title">{{ $event->title }}</h3>
                        <p class="card__meta">
                            {{ $event->scheduled_at->format('Y-m-d H:i') }}
                            ／ {{ $event->place }}
                        </p>
                        <p class="card__meta">
                            定員：{{ $event->capacity ?? '未設定' }}名
                            ／ 申込：{{ $event->applications()->count() }}名
                        </p>
                        <div class="card__actions">
                            <a href="{{ route('events.show',$event) }}"
                               class="btn btn--ghost">
                                詳細
                            </a>
                            <a href="{{ route('apply.index',['event_id'=>$event->id]) }}"
                               class="btn btn--primary">
                                申し込む
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif

        {{-- 申し込みフォーム --}}
<div class="entry__form">
        <h2 class="section__subtitle">申し込みフォーム</h2>

<form action="{{ route('apply.store') }}" method="POST">
    @csrf
    <div class="form__group">
        <label for="event_id">参加したいイベント必須</label>
        <select name="event_id" id="event_id">
            <option value="">イベントを選択してください</option>

            @foreach ($events as $event)
                <option value="{{ $event->id }}"
                    {{ (string)old('event_id', $selectedEventId) === (string)$event->id ? 'selected' : '' }}>
                    {{ $event->scheduled_at->format('Y-m-d') }} ／ {{ $event->title }}
                </option>
            @endforeach
        </select>

        @error('event_id')
            <p class="form__error">{{ $message }}</p>
        @enderror
    </div>
</form>

            {{-- お名前 --}}
            <div class="form__group">
                <label for="name">お名前必須</label>
                <input type="text" id="name" name="name"
                       value="{{ old('name') }}">
                @error('name')
                    <p class="form__error">{{ $message }}</p>
                @enderror
            </div>

            {{-- 年齢 --}}
            <div class="form__group">
                <label for="age">年齢（任意）</label>
                <input type="number" id="age" name="age"
                       value="{{ old('age') }}" min="0">
                @error('age')
                    <p class="form__error">{{ $message }}</p>
                @enderror
            </div>

            {{-- メール --}}
            <div class="form__group">
                <label for="email">メールアドレス必須</label>
                <input type="email" id="email" name="email"
                       value="{{ old('email') }}">
                @error('email')
                    <p class="form__error">{{ $message }}</p>
                @enderror
            </div>

            {{-- メッセージ --}}
            <div class="form__group">
                <label for="message">ひとこと / 配慮してほしいことなど（任意）</label>
                <textarea id="message" name="message" rows="4">{{ old('message') }}</textarea>
                @error('message')
                    <p class="form__error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn--primary">
                送信する
            </button>
        </form>
    </div>
</div>
</section>
@endsection
