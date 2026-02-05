{{-- resources/views/privacy.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-3xl px-4 py-10" style="width:70%; margin:100px auto;">
  <h1 class="text-2xl sm:text-3xl font-bold tracking-tight mb-6">
    プライバシーポリシー
  </h1>

  <div class="prose prose-sm sm:prose-base max-w-none">
    <p>
      町田emo（以下「当サイト」）は、当サイトにおける個人情報の取扱いについて、以下のとおりプライバシーポリシーを定め、個人情報の保護に努めます。
    </p>

    <hr>

    <h2>1．個人情報の取得について</h2>
    <p>当サイトでは、以下の場合に利用者の個人情報を取得することがあります。</p>
    <ul>
      <li>お問い合わせフォームの送信時</li>
      <li>イベント・活動への参加申込時</li>
      <li>会員登録・ログイン機能を利用する場合</li>
    </ul>
    <p>取得する情報は、主に以下の内容です。</p>
    <ul>
      <li>氏名</li>
      <li>メールアドレス</li>
      <li>お問い合わせ内容・申込内容</li>
      <li>その他、入力フォームに記載された情報</li>
    </ul>

    <h2>2．個人情報の利用目的</h2>
    <p>取得した個人情報は、以下の目的の範囲内で利用します。</p>
    <ul>
      <li>お問い合わせへの回答・連絡のため</li>
      <li>イベント・活動に関する連絡や運営管理のため</li>
      <li>サイト運営およびサービス向上のため</li>
    </ul>
    <p>これらの目的以外で利用することはありません。</p>

    <h2>3．個人情報の管理</h2>
    <p>
      当サイトは、取得した個人情報を適切に管理し、不正アクセス、紛失、漏えい、改ざん等の防止に努めます。
    </p>

    <h2>4．個人情報の第三者提供について</h2>
    <p>当サイトは、次の場合を除き、取得した個人情報を第三者に提供することはありません。</p>
    <ul>
      <li>本人の同意がある場合</li>
      <li>法令に基づき開示が必要な場合</li>
      <li>業務遂行上、必要な範囲で業務委託先に提供する場合</li>
    </ul>
    <p>
      なお、業務委託先に対しては、適切な管理・監督を行います。
    </p>

    <h2>5．Cookie（クッキー）について</h2>
    <p>
      当サイトでは、サイトの利便性向上や利用状況の把握のために、Cookieを使用する場合があります。
      Cookieには、個人を特定できる情報は含まれていません。
    </p>
    <p>
      利用者は、ブラウザの設定によりCookieの使用を拒否することができますが、その場合、当サイトの一部機能が正常に利用できないことがあります。
    </p>

    <h2>6．個人情報の開示・訂正・削除について</h2>
    <p>
      利用者ご本人から、自己の個人情報について開示、訂正、削除等の請求があった場合には、本人確認のうえ、適切に対応します。
    </p>

    <h2>7．プライバシーポリシーの変更</h2>
    <p>
      当サイトは、法令の変更や運営内容の見直しにより、本ポリシーの内容を予告なく変更することがあります。
      変更後のプライバシーポリシーは、本ページに掲載した時点で効力を生じるものとします。
    </p>

    <h2>8．お問い合わせ先</h2>
    <p>
      個人情報の取扱いに関するお問い合わせは、下記までご連絡ください。
    </p>

    <div class="not-prose mt-4 rounded-xl border border-gray-200 bg-gray-50 p-4">
      <p class="m-0"><span class="font-semibold">運営者名</span>：宇野敬</p>
      <p class="m-0"><span class="font-semibold">メールアドレス</span>：<a class="underline" href="mailto:unotakky31@gmail.com">unotakky31@gmail.com</a></p>
    </div>

    <p class="mt-8 text-sm text-gray-500">
      制定日：{{ date('Y年n月j日') }}
    </p>
  </div>

  <div class="mt-8">
    <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-sm underline">
      トップへ戻る
    </a>
  </div>
</div>
@endsection
