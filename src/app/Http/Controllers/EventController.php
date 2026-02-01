<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::query()
            ->whereNotNull('scheduled_at')
            ->whereDate('scheduled_at', '>=', now()->toDateString()) // ★ここが重要
            ->orderBy('scheduled_at', 'asc')
            ->get();

            dd(
    now()->toDateString(),
    Event::query()
        ->select('id','title','scheduled_at')
        ->orderBy('scheduled_at','asc')
        ->get()
        ->toArray()
);

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
        $memberId = auth()->user()->member?->id;
        abort_unless($memberId, 403); // member以外の作成を弾く（念のため）

        Event::create([
            'title'        => $request->title,
            'type'         => $request->type,
            'description'  => $request->description,
            'scheduled_at' => $request->scheduled_at,
            'place'        => $request->place,
            'capacity'     => $request->capacity,
            'application_path' => $request->application_path,
            'member_id'    => $memberId,
        ]);

        return redirect()->route('apply.index')
            ->with('success', 'イベントを登録しました。');
    }

    // イベント詳細
    public function show(Event $event)
    {
        $applicationsCount = $event->applications()->count();

        return view('events.show', compact('event', 'applicationsCount'));
    }

    public function destroy(Request $request, Event $event)
    {
    $memberId = $request->user()->member?->id;

    abort_unless($memberId && $event->member_id === $memberId, 403);

    $event->delete();

    return redirect()->route('apply.index')->with('success', 'イベントを削除しました。');
}

}
