@extends('layouts.app')

@section('title', 'メンバー')

@section('content')
<section class="section">
    <div class="container section__inner">
        <div class="section__header">
            <div>
                <h2 class="section__title">メンバー</h2>
                <p class="section__lead">町田 emo プロジェクトを運営するメンバーをご紹介します。</p>
            </div>
        </div>

        @if($members->isEmpty())
            <p>現在、表示できるメンバーがいません。</p>
        @else
            <!-- <div class="grid grid--3"> -->
                @foreach($members as $member)
                    <article class="card">
                        <div class="member-card__top">
                            <div class="member-card__photo">
                                <img src="{{ $member->avatar_path }}" alt="{{ $member->name }}">
                            </div>

                            <div class="member-card__meta">
                                <h3 class="card__title">{{ $member->name }}</h3>
                                @if($member->role_label)
                                    <p class="card__role">{{ $member->role_label }}</p>
                                @endif
                            </div>
                        

                        @if($member->bio)
                            <p class="card__text member-card__bio">
                                {{ $member->bio }}
                            </p>
                        @endif
                        </div>
                        <div class="card__actions">
                            @if($member->note_url)
                                <a class="btn btn--ghost" href="{{ $member->note_url }}" target="_blank" rel="noopener">
                                    note
                                </a>
                            @endif

                            @if($member->instagram_url)
                                <a class="btn btn--ghost" href="{{ $member->instagram_url }}" target="_blank" rel="noopener">
                                    Instagram
                                </a>
                            @endif
                        </div>
                    </article>
                @endforeach
            <!-- </div> -->
        @endif
    </div>
</section>
@endsection
