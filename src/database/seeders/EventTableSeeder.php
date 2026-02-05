<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::insert([[
            'title' => '自然を五感で感じよう！冬の自然観察会',
            'type' => '自然観察会',
            'description' => '自然観察会で冬の落ち葉や生き物を観察しよう。暖かいコーヒーと焼き芋も準備しています。',
            'place' => '忠生公園',
            'scheduled_at' => '2025-12-3',
            'capacity' => 10,
            'application_path' => 'https://docs.google.com/forms/d/e/1FAIpQLScw56e84AoNgoeYoTaDIzaIcOVm1VfoA4EdgETOqZkzV2thFg/viewform?usp=dialog',
            'status' => 'published',
            'created_at' => now(),

        ],
        [
            'title' => '5キロ走って5キロのゴミを拾おう',
            'type' => 'プロギング',
            'description' => '走りながら体を温めて、町もきれいにしよう！今回は今までにないコースをチョイスしています。',
            'place' => '忠生公園',
            'scheduled_at' => '2025-12-14',
            'capacity' => 10,
            'application_path' => 'https://docs.google.com/forms/d/e/1FAIpQLScndQprIwQBxEFalg-CS60pKwIwFi8Y7LeZREaNPFAtKy0wgA/viewform?usp=dialog',
            'status' => 'published',
            'created_at' => now(),
        ],
        [
            'title' => 'さつまいも収穫体験',
            'type' => '農業体験',
            'description' => 'サツマイモを収穫して焼き芋を作ろう！畑で出会える生き物もみんなで共有しよう',
            'place' => '橋本農園',
            'scheduled_at' => '2026-01-22',
            'capacity' => '30',
            'application_path' => 'https://docs.google.com/forms/d/e/1FAIpQLScndQprIwQBxEFalg-CS60pKwIwFi8Y7LeZREaNPFAtKy0wgA/viewform?usp=dialog',
            'status' => 'published',
            'created_at' => now(),
        ],
    ]);
}
}
