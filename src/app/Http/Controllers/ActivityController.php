<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityRequest;
use App\Models\Activity;
use App\Models\Event;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    // 活動報告一覧（一般公開）
    public function index()
    {
        $activities = Activity::withCount('likes', 'comments')
            ->with('event')
            ->orderBy('published_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('activities.index', compact('activities'));
    }

    // 詳細（いいね・コメント付き）
    public function show(Activity $activity)
    {
        $activity->load(['event', 'author', 'comments.user', 'likes']);

        $userLike = null;
        if (auth()->check()) {
            $userLike = $activity->likes
                ->firstWhere('user_id', auth()->id());
        }

        return view('activities.show', compact('activity', 'userLike'));
    }

    // 作成フォーム（メンバーのみ）
    public function create()
    {
        if (!auth()->check() || !auth()->user()->isMember()) {
            abort(403);
        }

        $events = Event::orderBy('scheduled_at', 'desc')->get();

        return view('activities.create', compact('events'));
    }

    // 保存
    public function store(StoreActivityRequest $request)
    {
        $data = $request->validated();
        $data['created_by'] = auth()->id();

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail_path'] = $request->file('thumbnail')
                ->store('activities', 'public');
        }

        $activity = Activity::create($data);

        return redirect()
            ->route('activities.show', $activity)
            ->with('success', '活動報告を投稿しました。');
    }

    // いいね
    public function like(Activity $activity)
    {
        $user = auth()->user();

        Like::firstOrCreate([
            'user_id'     => $user->id,
            'activity_id' => $activity->id,
        ]);

        return back();
    }

    // いいね解除
    public function unlike(Activity $activity)
    {
        $user = auth()->user();

        Like::where('user_id', $user->id)
            ->where('activity_id', $activity->id)
            ->delete();

        return back();
    }

    // コメント投稿
    public function comment(Activity $activity, Request $request)
    {
        $request->validate([
            'body' => ['required', 'string', 'max:1000'],
        ]);

        Comment::create([
            'activity_id' => $activity->id,
            'user_id'     => auth()->id(),
            'body'        => $request->body,
        ]);

        return back();
    }
}
