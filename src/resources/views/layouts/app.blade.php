<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', '町田emoプロジェクト')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">

    {{-- Vite は今回は使わない --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <link rel="stylesheet" href="{{ asset('css/emo.css') }}">
</head>
<body>
<header class="header">
    <div class="container header__inner">
        <a class="header__logo" href="{{ route('home') }}">
            <span class="header__logo-mark">emo</span>
            <span class="header__logo-text">町田 emo プロジェクト</span>
        </a>

        <nav class="nav">
            <a href="{{ route('home') }}">ホーム</a>
            <a href="{{ route('activities.index') }}">活動報告</a>
            <a href="{{ route('members.index') }}">メンバー</a>
            <a href="{{ route('apply.index') }}">活動申し込み</a>
            <!-- <a href="{{ route('contact.index') }}">お問い合わせ</a> -->

            @auth
                {{-- メール未認証なら確認ページ導線（必要なければ消してOK） --}}
                <!-- @if(method_exists(auth()->user(), 'hasVerifiedEmail') && !auth()->user()->hasVerifiedEmail())
                    <a href="{{ route('verification.notice') }}">メール確認</a>
                @endif -->

                @if(method_exists(auth()->user(), 'isMember') && auth()->user()->isMember())
                    <a href="{{ route('events.create') }}">イベント作成</a>
                    <a href="{{ route('activities.create') }}">報告作成</a>
                @endif

                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    ログアウト
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                    @csrf
                </form>
            @else
                <a href="{{ route('register') }}">新規登録</a>
                <a href="{{ route('login') }}">ログイン</a>
            @endauth
        </nav>
    </div>
</header>

<main>
    @yield('content')
</main>

<footer class="footer">
    <!-- <div class="container footer__inner">
        <p class="footer__copy">© {{ date('Y') }} Machida emo Project</p>
    </div> -->
    <div class="container footer__info">
    <p>
        © 町田emoプロジェクト<br>
        本サイトでは個人情報を適切に管理し、運営目的の範囲内でのみ利用します。
        Cookieを使用する場合がありますが、個人を特定する情報は含まれません。<br>
        お問い合わせ：unotakky31@gmail.com
    </p>
    <a href="{{ route('privacy') }}">プライバシーポリシー</a>
    </div>
</footer>
</body>
</html>
