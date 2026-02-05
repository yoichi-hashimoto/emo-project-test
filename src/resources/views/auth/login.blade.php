@extends('layouts.app')

@section('title', 'ログイン | 町田emoプロジェクト')

@section('content')
<section class="section section--tint">
    <div class="container section__inner section__narrow">
        <h2 class="section__title">ログイン</h2>
        <p class="section__lead">
            メールアドレスとパスワードでログインしてください。
        </p>

        {{-- エラーメッセージ --}}
        @if ($errors->any())
            <div class="card" style="margin-bottom:16px;">
                <ul style="margin:0; padding-left:20px; font-size:13px; color:#c0392b;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form__group">
                <label for="email">メールアドレス</label>
                <input id="email"
                       type="email"
                       name="email"
                       value="{{ old('email') }}"
                       required
                       autocomplete="email"
                       autofocus>
            </div>

            <div class="form__group">
                <label for="password">パスワード</label>
                <input id="password"
                       type="password"
                       name="password"
                       required
                       autocomplete="current-password">
            </div>

            <div class="form__group" style="flex-direction:row; align-items:center; gap:8px;">
                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember" style="margin:0; font-size:13px;">ログイン状態を保持する</label>
            </div>

            <div class="form__group" style="margin-top:8px;">
                <div class="card__actions">
                <button type="submit" class="btn btn--primary" style="width:70%; margin-right:10px;">
                    ログイン
                </button>

                <a class="btn btn--ghost" href="{{ route('register') }}">
                    新規登録    
                </a>
                </div>
            </div>
        </form>
    </div>
    <div class="container section__inner section__narrow" style="margin-top:16px; text-align:right;">
    <a href="{{ route('password.request') }}"
        class="text-sm text-blue-600 hover:underline">
        パスワードをお忘れですか？
    </a>
    </div>

</section>
@endsection
