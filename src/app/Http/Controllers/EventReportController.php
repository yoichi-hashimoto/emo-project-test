<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventReportRequest;
use App\Models\Event;
use App\Models\EventReport;

class EventReportController extends Controller
{
    // 報告一覧（一般公開）
    public function index()
    {
        $reports = EventReport::with('event', 'author')
            ->orderBy('published_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('activities.index', compact('reports'));
    }

    // 報告作成フォーム（メンバーのみ）
    public function create()
    {
        if (!auth()->check() || !auth()->user()->isMember()) {
            abort(403);
        }

        // どのイベントの報告か紐づけられるように一覧を渡す
        $events = Event::orderBy('scheduled_at', 'desc')->get();

        return view('activities.create', compact('events'));
    }

    // 報告保存（メンバーのみ）
    public function store(StoreEventReportRequest $request)
    {
        $data = $request->validated();
        $data['created_by'] = auth()->id();

        // サムネイル画像アップロード（任意）
        if ($request->hasFile('thumbnail')) {
            $data['thumbnail_path'] = $request->file('thumbnail')
                ->store('thumbnails', 'public');
        }

        EventReport::create($data);

        return redirect()
            ->route('activities.index')
            ->with('success', 'イベント報告を投稿しました。');
    }
}
