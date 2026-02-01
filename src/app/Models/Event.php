<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',          // ← category ではなく type
        'description',
        'scheduled_at',
        'place',
        'capacity',
        'application_path', // 追加部分
        'member_id',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    /**
     * 種別(type)ごとの固定画像パスを返すアクセサ
     * Blade からは $event->category_image で呼び出せます
     */
    public function getCategoryImageAttribute(): string
    {
        // DB の type カラムを元に判定
        $type = trim(mb_strtolower((string) $this->type));

        if (in_array($type, ['plogging', 'プロギング'], true)) {
            return asset('images/proging.png');
        }

        if (in_array($type, ['farm', '農業体験'], true)) {
            return asset('images/farm-exhibition.png');
        }

        if (in_array($type, ['nature', '自然観察会'], true)) {
            return asset('images/nature-trail.png');
        }

        if (in_array($type, ['other', 'その他'], true)) {
            return asset('images/events/other.png');
        }

        // どれにも当てはまらない場合のデフォルト
        return asset('images/events/default.jpg');
    }
}
