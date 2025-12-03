<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Models\Event;

class EventController extends Controller
{
    // イベント一覧（一般公開）
    public function index() 
    {
        $events = Event::orderBy('scheduled_at', 'asc')->get();

        return view('events.index', compact('events'));
    }

    // イベント作成フォーム（メンバーのみ）
    public function create()
    {
        if (!auth()->check() || !auth()->user()->isMember()) {
            abort(403);
        }

        return view('events.create');
    }

    public function store(StoreEventRequest $request)
    {
    Event::create([
        'title'        => $request->title,
        'type'         => $request->type,        // ← ここも type
        'description'  => $request->description,
        'scheduled_at' => $request->scheduled_at,
        'place'        => $request->place,
        'capacity'     => $request->capacity,
    ]);

    return redirect()->route('apply.index')
        ->with('success', 'イベントを登録しました。');
    }

    // 追加：イベント詳細
    public function show(Event $event)
    {
        // 申し込み人数（applications リレーションがある前提）
        $applicationsCount = $event->applications()->count();

        return view('events.show', compact('event', 'applicationsCount'));
    }
}
