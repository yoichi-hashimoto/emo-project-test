@extends('layouts.app')

@section('content')
<div class="section">
  <div class="container section__inner section__narrow">
    <div class="card">
      <h1 class="section__title">メールアドレスの確認</h1>
      <p class="section__lead">
        ご登録のメールアドレス宛に確認リンクを送信しました。メール内のリンクをクリックして完了してください。
      </p>

      @if (session('status') === 'verification-link-sent')
        <div class="alert alert--success" style="margin-bottom:16px;">
          確認メールを再送しました。受信トレイをご確認ください。
        </div>
      @endif

      <div class="card__actions">
        <form method="POST" action="{{ route('verification.send') }}">
          @csrf
          <button class="btn btn--primary" type="submit">確認メールを再送信</button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="btn btn--ghost" type="submit">ログアウト</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
