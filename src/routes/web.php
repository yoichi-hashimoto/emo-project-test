<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/apply',[ApplyController::class,'index'])->name('apply.index');
Route::post('/apply',[ApplyController::class,'store'])->name('apply.store');

Route::get('/members',[MemberController::class,'index'])->name('members.index');

Route::get('/contact',[ContactController::class,'index'])->name('contact.index');
Route::post('/contact',[ContactController::class,'store'])->name('contact.store');


// ───── イベント ─────

// 一覧（一般公開）
Route::get('/events', [EventController::class, 'index'])->name('events.index');

// 作成（メンバー専用）
Route::middleware(['auth', 'member'])->group(function () {
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
});

// 詳細（パラメータ付きは最後）
Route::get('/events/{event}', [EventController::class, 'show'])
    ->name('events.show');


// ───── 活動報告（activities）─────

// 一覧（一般公開）
Route::get('/activities', [ActivityController::class, 'index'])
    ->name('activities.index');

// 作成フォーム＆保存（メンバー専用）
Route::middleware(['auth', 'member'])->group(function () {
    Route::get('/activities/create', [ActivityController::class, 'create'])
        ->name('activities.create');

    Route::post('/activities', [ActivityController::class, 'store'])
        ->name('activities.store');
});

// 詳細（これも一番最後）
Route::get('/activities/{activity}', [ActivityController::class, 'show'])
    ->name('activities.show');


// いいね・コメント（ログイン必須）
Route::middleware('auth')->group(function () {
    Route::post('/activities/{activity}/like', [ActivityController::class, 'like'])
        ->name('activities.like');

    Route::delete('/activities/{activity}/like', [ActivityController::class, 'unlike'])
        ->name('activities.unlike');

    Route::post('/activities/{activity}/comments', [ActivityController::class, 'comment'])
        ->name('activities.comment');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
