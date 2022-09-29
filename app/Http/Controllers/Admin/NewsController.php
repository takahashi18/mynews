<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//以下の追加でnews:modelが扱えるようになる
use App\Models\News;
class NewsController extends Controller
{
    //addというActionをNewsControllerに追加（4−9）
    public function add()
    {
        return view('admin.news.create');

        //return 戻り値を指定：returnで返される値がそのアドレスにアクセスした際表示される
        //view関数で戻り値の用意をしている　このviewを使うことでviewフォルダのプレートエンジンの使用が可能
    }
    public function create(Request $request)
    {
        //以下を追記：varidationを行う
        $this->validate($request, News::$rules);

        $news = new News;
        $form = $request->all();

        //フォームから画像が送信だれてきたら、保存し、$news->image_path　に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $news->image_path = basename($path);
        } else {
            $news->image_path = null;
        }
        //フォームから送信されてきた_tokenを削除する
        unset($form['_token']);

        //フォームから送信されてきた_imageを削除する
        unset($form['image']);

        //データベースを保存する
        $news->fill($form);
        $news->save();

        //admin/newscreateにリダイレクトする
        return redirect('admin/news/create');
    }
}