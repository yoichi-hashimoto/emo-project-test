<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Application;
use App\Http\Requests\StoreApplicationRequest; // 使っていれば

class ApplyController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::query()
            ->whereNotNull('scheduled_at')
            ->whereDate('scheduled_at', '>=', now()->toDateString()) // ★ここが重要
            ->orderBy('scheduled_at', 'asc')
            ->get();

        Event::query()
        ->select('id','title','scheduled_at')
        ->orderBy('scheduled_at','asc')
        ->get()
        ->toArray();
        // /apply?event=◯◯ で渡ってくる ID
        $selectedEventId = $request->query('event_id');

        return view('apply.index', compact('events', 'selectedEventId'));
    }

    public function store(StoreApplicationRequest $request)
    {
        $event = Event::withCount('applications')->findOrFail($request->event_id);

        // 定員チェック（定員が設定されていて、すでに満席ならエラー）
        if ($event->capacity && $event->applications_count >= $event->capacity) {
            return back()
                ->withErrors(['event_id' => 'このイベントは定員に達しました。別のイベントをお選びください。'])
                ->withInput();
        }

        Application::create([
            'event_id' => $event->id,
            'name'     => $request->name,
            'age'      => $request->age,
            'email'    => $request->email,
            'message'  => $request->message,
        ]);

        return redirect()
            ->route('apply.index')
            ->with('success', 'お申し込みを受け付けました！');
    }
}
