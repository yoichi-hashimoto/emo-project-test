@extends('layouts.app')

@section('title', 'ダッシュボード')

@section('content')
<div class="section">
    <div class="container section__inner">
        <div class="card">
            <h1 class="section__title">ダッシュボード</h1>
            <p class="section__lead">ログインしました。</p>

            <div class="card__actions">
                <a class="btn btn--primary" href="{{ route('home') }}">ホームへ</a>
                <a class="btn btn--ghost" href="{{ route('apply.index') }}">活動申し込みへ</a>
            </div>
        </div>
    </div>
</div>
@endsection
