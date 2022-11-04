<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

// 追記
use App\Models\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        //　$cond_title が空白でない場合は、記事を検索して取得する
        if ($cond_title != '') {
            $posts = News::where('title', $cond_title).orderBy('updated_at','desc')->get();
        } else {
            $posts = News::all()->sortByDesc('updated_at');
            //News::all〜　：全てのnewsテーブルを取得するというメソッド
            // sortByDesc()：カッコの中の値（キー）に並び替え（ソート）するためのメソッド
            //sort By（）：昇順に並べる
            //sort By Desc（）：降順に並べる
            //つまり投稿日時旬に新しい方から並べる
        }

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        //　news/index.blade.php　ファイルを渡している
        //　また　View テンプレートにheadline、posts、cond_title という変数を渡している
        return view('news.index',['headline' => $headline, 'posts'=> $posts, 'cond_title' => $cond_title]);
    }
}