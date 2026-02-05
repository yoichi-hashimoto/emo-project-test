<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activity::insert([[
            'event_id' => 1,
            'title' => '秋の自然観察会を開催しました',
            'body' => '11月15日に秋の自然観察会を開催しました。参加者は落ち葉や冬支度をする生き物たちを観察し、自然の変化を感じることができました。暖かい飲み物と焼き芋も好評でした。',
            'category' => '自然観察会',
            'published_at' => '2025-11-15',
            'created_by' => '1',
            'created_at' => now(),
        ],
        [
            
            'event_id' => 2,
            'title' => '町田市内でプロギングイベントを実施',
            'body' => '12月1日に町田市内でプロギングイベントを実施しました。参加者は5キロ走りながら5キロのゴミを拾い、地域の美化に貢献しました。新しいコースも好評で、多くの笑顔が見られました。',
            'category' => 'プロギング',
            'published_at' => '2025-12-01',
            'created_by' => '1',
            'created_at' => now(),
        ],

    [
        'event_id' => 3,
        'title' => 'さつまいも収穫体験を開催しました',
        'body' => '1月20日に橋本農園でさつまいも収穫体験を開催しました。参加者は畑でサツマイモを収穫し、その後焼き芋を作って楽しみました。畑で出会った生き物たちも共有し、自然とのふれあいを深めることができました。',
        'category' => '農業体験',
        'published_at' => '2026-01-20',
        'created_by' => '1',
        'created_at' => now(),
    ],
    ]);
    }
}