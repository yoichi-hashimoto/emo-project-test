<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::insert([
            [
                'name' => '宇野 敬',
                'role_label' => '代表',
                'bio' => '高校時代に小笠原を訪れ、自然の中で過ごす時間の豊かさに強く心を動かされました。その体験をきっかけに、人と自然をつなぐ案内人になりたいという夢を描くようになりました。
                現在は町田emoプロジェクトのリーダーとして、自然観察や街での活動を通じて、人と自然、人と人がゆるやかにつながる場づくりに取り組んでいます。
                木や草花、野鳥など身近な自然の話題が好きで、気づけば時間を忘れて話してしまうこともあります。
                自然を楽しみながら、街や人との関係を少しずつ育てていけたら嬉しいです。',
                'sort_order' => 1,
                'created_at' => now(),
                'avatar_path' => '/images/member/t_uno_1.jpg',
                'user_id' => 1,
            ],
            [
                'name' => '芝田 達也',
                'role_label' => 'メンバー',
                'bio' => '埼玉県北本市に住んでいます。町田でのEMOの活動に参加することで、地域の自然環境を守る一助となればと思っています。',
                'sort_order' => 2,
                'created_at' => now(),
                'avatar_path' => '/images/member/t_shibata_1.jpeg',
                'user_id' => 2,
            ],
            [
                'name' => '橋本 陽一',
                'role_label' => 'メンバー',
                'bio' => '生きづらさを抱えていた親族に対して何もできなかった経験があり、社会貢献が出来ればと思い本プロジェクトに参加しました。2025年まで神奈川県川崎市に住んでいましたが、現在は福島県に移住しています。主にメール案内やホームページ作成などを担当しています。趣味は釣りとランニングです。',
                'sort_order' => 3,
                'created_at' => now(),
                'avatar_path' => '/images/member/y_hashimoto_1.jpg',
                'user_id' => 3,
            ],
        ]);
    }
}
