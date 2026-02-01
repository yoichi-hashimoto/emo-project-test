@extends('layouts.app')

@section('content')
<div class="section">
  <div class="container section__inner section__narrow">
    <div class="card">
      <h1 class="section__title">パスワード再設定</h1>
      <p class="section__lead">登録メールアドレス宛に、再設定リンクを送信します。</p>

      @if (session('status'))
        <div class="alert alert--success" style="margin-bottom:16px;">
          {{ session('status') }}
        </div>
      @endif

      @if ($errors->any())
        <div class="alert alert--error" style="margin-bottom:16px;">
          <ul style="margin:0; padding-left:18px;">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form__group">
          <label>メールアドレス</label>
          <input type="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="card__actions">
          <button class="btn btn--primary" type="submit">再設定リンクを送信</button>
          <a class="btn btn--ghost" href="{{ route('login') }}">ログインへ</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
