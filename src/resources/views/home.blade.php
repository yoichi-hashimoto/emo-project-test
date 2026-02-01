@extends('layouts.app')

@section('title', 'ホーム | 町田emoプロジェクト')

@section('content')
<section class="hero">
    <div class="container hero__inner">
        <div class="hero__text">
            <h1>プロギング・自然観察・農業体験で<br>つながる “居場所” を。</h1>
            <h2 class="section__title">町田emoプロジェクトとは</h2>
            <p>町田emoプロジェクトは「感情と共感が価値を持つ『emo時代』を切りひらく」というビジョンを掲げて活動している団体です。</br>
                プロギングや自然体験を通じて、感情が動き、共感が生まれ、「一人じゃない」と感じられる社会を目指しています。</br>「感情と共感が価値を持つ『emo時代』を切りひらく」というビジョンを掲げて活動している団体です。</p>
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
            <img src="{{ asset('images/ploging1.jpg') }}" class="slide active">
            <img src="{{ asset('images/nature1.jpg') }}" class="slide">
            <img src="{{ asset('images/ploging2.jpg') }}" class="slide">
            <img src="{{ asset('images/nature2.jpg') }}" class="slide">
            <img src="{{ asset('images/ploging3.jpg') }}" class="slide">
            <img src="{{ asset('images/nature3.jpg') }}" class="slide">
            <img src="{{ asset('images/ploging_1stTime.jpg') }}" class="slide">
        </div>
    </div>
            <div class="sub__sentence">
                <p>
                "楽しい、うれしい、モヤモヤする、なんとなく落ち着く"<br>
                そんな言葉にならない感情も、すべて大切な「emo」です。<br>
                町田emoプロジェクトは、感情を否定せず、そのまま分かち合える場を通して<br>
                人が人らしくいられる社会を育んでいきます。
                </p>
                <!-- <a href="{{ route('apply.index') }}" class="btn btn--primary">活動に申し込む</a>
                <a href="{{ route('activities.index') }}" class="btn btn--ghost">活動報告を見る</a> -->
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
        <h2 class="hero__text">
                主な活動</h2>

        <div class="grid grid--3">
            <article class="card">
                <img src="{{ asset('/images/ploging_summer.jpg') }}" alt="プロギング" class="card__image">
                <h3 class="card__title">プロギング</h3>
                <p class="card__text">プロギングとは、ジョギングやウォーキングをしながらごみを拾う、スウェーデン発の環境と健康を両立する活動です。プロギングを地域に関わる第一歩として位置づけています。走る速さや体力、経験は関係ありません。同じ時間を一緒に過ごすことで、初対面の人同士でも自然に会話が生まれます。この自然でさりげない活動が、現代の孤立や生きづらさを和らげるきっかけになると考えています。</p>
            </article>
            <article class="card">
                <img src="{{ asset('/images/nature_autmun.jpg')}}" alt="自然観察会" class="card__image">
                <h3 class="card__title">自然観察会</h3>
                <p class="card__text">五感で自然を楽しむ活動として、自然観察会を行っています。公園や市街地で植物や生きものに目を向けることで、自然に触れることで気持ちが解放され、自分らしさを取り戻す事ができます。年齢や立場に関係なく、同じ体験を共有できることも、この活動の大きな魅力です。</p>
            </article>
            <article class="card">
                <img src="{{asset('/images/farm_exhibition.jpg')}}" alt="農業体験" class="card__image">
                <h3 class="card__title">農業体験</h3>
                <p class="card__text">農業体験を通じた活動も行っています。畑で土に触れ、作物を育て、収穫し、そしてみんなで食べる。そうした一連の体験を通して、人と自然の関係性や、人と人とのゆるやかなつながりが自然に生まれていくことを目指しています。現在は、地域の農家や関係者の方々と相談を重ねながら、実施に向けた準備を進めている段階です。</p>
            </article>
        </div>
    </div>
</section>

{{-- SNS・外部リンク セクション --}}
<section class="section section--tint">
    <div class="container section__inner section__narrow">
        <h2 class="section__title">SNS・ブログ</h2>
        <!-- <p class="section__lead">
            <!-- 町田emoプロジェクトの活動の様子や、プロギング／自然観察会の裏側は
            note と Instagram でも発信しています。 -->
        <!-- </p> -->

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
