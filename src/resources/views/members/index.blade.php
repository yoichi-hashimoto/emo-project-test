@extends('layouts.app')

@section('title', 'メンバー紹介 | 町田emoプロジェクト')

@section('content')
<section class="section">
    <div class="container section__inner">
        <h2 class="section__title">メンバー紹介</h2>
        <p class="section__lead">
            代表1名とメンバー2名で、ゆるやかに運営しています。  
            将来的にはここをDBから表示する形にできます。
        </p>

        <div class="grid grid--3">
            @foreach($members ?? [] as $member)
                <article class="card card--member">
                    <div class="avatar">{{ $member->initials ?? 'M' }}</div>
                    <h3 class="card__title">{{ $member->name }}</h3>
                    <p class="card__role">{{ $member->role }}</p>
                    <p class="card__text">{{ $member->message }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endsection
