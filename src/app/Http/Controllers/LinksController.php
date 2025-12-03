<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinksController extends Controller
{
    public function index()
    {
        $notePosts = [
            [
                'title' => '〇月プロギングの振り返り',
                'url'   => 'https://note.com/heri_emon/n/ne000000', // ★実際の投稿URLに書き換え
                'desc'  => '今月のプロギング活動のレポートです。',
            ],
            [
                'title' => '自然観察会レポート',
                'url'   => 'https://note.com/heri_emon/n/nf111111', // ★実際の投稿URLに書き換え
                'desc'  => '生きものの発見が満載の一日。',
            ]
        ];

        $instagramPosts = [
            [
                'image_url' => 'https://via.placeholder.com/400x400?text=Instagram+Post',
                'url'       => 'https://www.instagram.com/emo.cloud_insta/',
                'desc'      => '活動の最新写真をInstagramで公開中！',
            ]
        ];

        return view('links.index', compact('notePosts', 'instagramPosts'));
    }
}
