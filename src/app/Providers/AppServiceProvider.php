<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\ResetPassword;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;
use App\Http\Responses\RegisterResponse;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(RegisterResponseContract::class, RegisterResponse::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
        return (new MailMessage)
            ->subject('【町田emo】メールアドレス確認のお願い')
            ->greeting('ご登録ありがとうございます。')
            ->line('以下のボタンをクリックして、メールアドレスの確認を完了してください。')
            ->action('メールアドレスを確認する', $url)
            ->line('心当たりがない場合は、このメールを破棄してください。');
    });

        ResetPassword::toMailUsing(function ($notifiable, $token) {
    $url = url(route('password.reset', [
        'token' => $token,
        'email' => $notifiable->getEmailForPasswordReset(),
    ], false));

    return (new MailMessage)
        ->subject('【町田emo】パスワード再設定')
        ->greeting('パスワード再設定のご案内です。')
        ->line('以下のボタンからパスワードを再設定してください。')
        ->action('パスワードを再設定する', $url)
        ->line('このリンクには有効期限があります。')
        ->line('心当たりがない場合は、このメールを破棄してください。');
});

    }
}
