
@extends('layouts.app')

@section('title', 'イベント登録 | 町田emoプロジェクト')

@section('content')
<section class="section section--tint">
    <div class="container section__inner section__narrow">
        <h2 class="section__title">イベント登録</h2>

        @if ($errors->any())
            <div class="card" style="margin-bottom:16px; color:#c62828;">
                <ul style="margin:0; padding-left:20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('events.store') }}" method="POST" class="form">
            @csrf

            <div class="form__group">
                <label for="title">タイトル<span class="badge badge--required">必須</span></label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            </div>

            <div class="form__group">
                <label for="type">種別<span class="badge badge--required">必須</span></label>
                <select id="type" name="type" required>
                    <option value="">選択してください</option>
                    <option value="plogging" @selected(old('type')==='plogging')>プロギング</option>
                    <option value="nature"   @selected(old('type')==='nature')>自然観察会</option>
                    <option value="farm"     @selected(old('type')==='farm')>農業体験</option>
                    <option value="other"    @selected(old('type')==='other')>その他</option>
                </select>
            </div>

            <div class="form__group">
                <label for="place">場所</label>
                <input type="text" id="place" name="place" value="{{ old('place') }}">
            </div>

            <div class="form__group">
                <label for="scheduled_at">日時</label>
                <input type="datetime-local" id="scheduled_at" name="scheduled_at"
                       value="{{ old('scheduled_at') }}">
            </div>

            <div class="form__group">
                <label for="capacity">定員</label>
                <input type="number" id="capacity" name="capacity" min="1" value="{{ old('capacity') }}">
            </div>

            <div class="form__group">
                <label for="description">説明</label>
                <textarea id="description" name="description" rows="5">{{ old('description') }}</textarea>
            </div>

            <div class="form__group">
                <button type="submit" class="btn btn--primary">登録する</button>
            </div>
        </form>
    </div>
</section>
@endsection
