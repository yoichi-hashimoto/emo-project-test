<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function index()
    {
        // これまでトップで使っていたデータ（例）
        $events = Event::orderBy('scheduled_at', 'asc')->get();

        // --- お知らせ用データ作成 ---

        // 活動報告（投稿）
        $activityNews = Activity::select(
                'id',
                'title',
                'created_at',
                DB::raw("'activity' as type")
            )
            ->latest('created_at')
            ->take(5)
            ->get();

        // イベント
        $eventNews = Event::select(
                'id',
                'title',
                'created_at',
                DB::raw("'event' as type")
            )
            ->latest('created_at')
            ->take(5)
            ->get();

        // まとめて日付順に並べ替え → 上から5件だけ使う
        $news = $activityNews
            ->concat($eventNews)
            ->sortByDesc('created_at')
            ->take(5)
            ->values();   // indexを振り直し

        return view('home', compact('events', 'news'));
    }
}
