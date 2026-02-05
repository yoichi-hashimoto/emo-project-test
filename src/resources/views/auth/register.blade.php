@extends('layouts.app')

@section('content')
<div class="section">
    <div class="container section__inner section__narrow">
        <div class="card">

            <h1 class="section__title">ユーザー新規登録</h1>
            <p class="section__lead">
                登録すると、活動報告への「グッジョブ👍」と「コメント」を投稿できます。
            </p>

            @if ($errors->any())
                <div class="alert alert--error" style="margin-bottom:16px;">
                    <ul style="margin:0; padding-left:18px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form__group">
                    <label>お名前</label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autofocus
                    >
                </div>

                <div class="form__group">
                    <label>メールアドレス</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                    >
                </div>

                <div class="form__group">
                    <label>パスワード(8文字以上)</label>
                    <input
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                    >
                </div>

                <div class="form__group">
                    <label>パスワード（確認）</label>
                    <input
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                    >
                </div>

                <div class="card__actions">
                    <button class="btn btn--primary" type="submit">
                        登録してメール認証へ
                    </button>

                    <a class="btn btn--ghost" href="{{ route('login') }}">
                        ログインへ
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
