@extends('layouts.app')

@section('title', 'ホーム | 町田emoプロジェクト')

@section('content')
<section class="hero">
    <div class="container hero__inner">
        <div class="hero__text">
            <h1>プロギング・自然観察・農業体験で<br>つながる “居場所” を。</h1>
            <p>
                生きづらさや特性を抱える若者たちが、安心してつながり、
                楽しさを感じられる場をつくるプロジェクトです。
            </p>
            <div class="hero__buttons">
                <a href="{{ route('apply.index') }}" class="btn btn--primary">活動に申し込む</a>
                <a href="{{ route('activities.index') }}" class="btn btn--ghost">活動報告を見る</a>
            </div>
        </div>
        <!-- <div class="hero__image">
            <div class="hero__circle hero__circle--1"></div>
            <div class="hero__circle hero__circle--2"></div>
            <div class="hero__scene">
                <span class="hero__tree hero__tree--left"></span>
                <span class="hero__tree hero__tree--right"></span>
                <span class="hero__runner"></span>
                <span class="hero__bird"></span>
            </div>
        </div> -->
    <div class="hero__image">
        <div class="hero__image slideshow">
            <img src="{{ asset('images/hero1.png') }}" class="slide active">
            <img src="{{ asset('images/hero2.png') }}" class="slide">
            <img src="{{ asset('images/hero3.png') }}" class="slide">
        </div>
    </div>
    </div>
</section>

{{-- お知らせ欄 --}}
<section class="section">
    <div class="container section__inner section__narrow">
        <div class="section__header">
            <div>
                <h2 class="section__title">お知らせ</h2>
                <p class="section__lead">イベント作成や活動報告の最新情報です。</p>
            </div>
        </div>
        @if($news->isEmpty())
            <p>現在お知らせはありません。</p>
        @else
            <ul class="news-list">
                @foreach($news as $item)
                    <li class="news-list__item">
                        {{-- 日付 --}}
                        <span class="news-list__date">
                            {{ $item->created_at->format('Y-m-d') }}
                        </span>

                        {{-- ラベル（イベント / 活動報告） --}}
                        <span class="news-list__label news-list__label--{{ $item->type }}">
                            {{ $item->type === 'event' ? 'イベント' : '活動報告' }}
                        </span>

                        {{-- タイトル（リンク先は必要に応じて変更） --}}
                        @php
                            $url = $item->type === 'event'
                                ? route('apply.index')      // イベントは申込ページへ
                                : route('activities.show', $item->id); // 活動報告詳細
                        @endphp

                        <a href="{{ $url }}" class="news-list__title">
                            {{ $item->title }}
                        </a>

                        {{-- 一番新しい1件だけ NEW 表示 --}}
                        @if($loop->first)
                            <span class="news-list__badge">NEW</span>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</section>


<section class="section">
    <div class="container section__inner">
        <h2 class="section__title">町田emoプロジェクトとは</h2>
        <p class="section__lead">
            代表1名・メンバー2名で、小さく温かいコミュニティ運営を行っています。  
            月1回のプロギングと、不定期の自然観察会・農業体験を組み合わせながら、
            ゆるやかに「つながり」を育てています。
        </p>

        <div class="grid grid--3">
            <article class="card">
                <h3 class="card__title">プロギング</h3>
                <p class="card__text">走る＆歩くペースはゆっくりめ。ごみ拾いをしながら町をめぐります。</p>
            </article>
            <article class="card">
                <h3 class="card__title">自然観察会</h3>
                <p class="card__text">季節の植物や生き物をのんびり観察。静かな時間を大切にします。</p>
            </article>
            <article class="card">
                <h3 class="card__title">農業体験</h3>
                <p class="card__text">畑で土に触れ、野菜を育てたり収穫したりする体験です。</p>
            </article>
        </div>
    </div>
</section>

{{-- SNS・外部リンク セクション --}}
<section class="section section--tint">
    <div class="container section__inner section__narrow">
        <h2 class="section__title">SNS・ブログ</h2>
        <p class="section__lead">
            町田emoプロジェクトの活動の様子や、プロギング／自然観察会の裏側は
            note と Instagram でも発信しています。
        </p>

        <div class="sns-links">
            {{-- note --}}
            <a href="https://note.com/heri_emon" class="card card--link sns-links__item" target="_blank" rel="noopener">
                <div class="sns-links__icon sns-links__icon--note">
                    {{-- アイコン画像を置いている場合 --}}
                    <img src="{{ asset('images/note-logo.png') }}" alt="note" class="sns-logo">
                    
                </div>
                <div class="sns-links__body">
                    <h3 class="sns-links__title">note</h3>
                    <p class="sns-links__text">
                        活動レポートやコラムを文章中心でまとめています。イベントの雰囲気をじっくり知りたい方に。
                    </p>
                </div>
            </a>

            {{-- Instagram --}}
            <a href="https://www.instagram.com/emo.cloud_insta/" class="card card--link sns-links__item" target="_blank" rel="noopener">
                <div class="sns-links__icon sns-links__icon--insta">
                     <img src="{{ asset('images/instagram-logo.png') }}" alt="Instagram" class="sns-logo">
                    
                </div>
                <div class="sns-links__body">
                    <h3 class="sns-links__title">Instagram</h3>
                    <p class="sns-links__text">
                        プロギングや自然観察会の写真・短い動画をサクッと更新。最新の活動の様子はこちらから。
                    </p>
                </div>
            </a>
        </div>
    </div>
</section>


<script>
document.addEventListener("DOMContentLoaded", () => {
    const slides = document.querySelectorAll(".slideshow .slide");
    let index = 0;

    setInterval(() => {
        slides[index].classList.remove("active");
        index = (index + 1) % slides.length;
        slides[index].classList.add("active");
    }, 3000); // 3秒
});
</script>

@endsection
