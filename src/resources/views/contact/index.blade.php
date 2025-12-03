@extends('layouts.app')

@section('title', 'お問い合わせ | 町田emoプロジェクト')

@section('content')
<section class="section">
    <div class="container section__inner section__narrow">
        <h2 class="section__title">お問い合わせ</h2>
        <p class="section__lead">
            活動に関するご質問やご相談など、お気軽にお送りください。
        </p>

        <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <div class="form__group">
                <label for="name">お名前</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}">
                @error('name')<p class="form__error">{{ $message }}</p>@enderror
            </div>

            <div class="form__group">
                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}">
                @error('email')<p class="form__error">{{ $message }}</p>@enderror
            </div>

            <div class="form__group">
                <label for="subject">件名</label>
                <input type="text" id="subject" name="subject" value="{{ old('subject') }}">
            </div>

            <div class="form__group">
                <label for="body">内容</label>
                <textarea id="body" name="body" rows="6">{{ old('body') }}</textarea>
                @error('body')<p class="form__error">{{ $message }}</p>@enderror
            </div>

            <button type="submit" class="btn btn--primary">送信する</button>
        </form>
    </div>
</section>
@endsection
