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
    // 4-17 追記　
    // 投稿したニュースを検索するための機能について
    public function index(Request $request)
    {
        $cond_title =$request->cond_title;
        //$request　の中の　cond_title　の値を　$cond_title に代入している
        //$request に　cond_title がなければ　null が代入される
        //この　cond_title は、最後の文『retun』からきた
        // return文によって、Requestにcond_titleを送っている
        //cond_titleとはname属性のこと、後に作成する’admin/news/index.blade.php’ファイルで検索用のテキストボックスを実装する際に設定している
        //つまり、Requestに　name属性cond_titleのフォームから送信されたデータを送っているということ。最初に開いた段階では、何も検索をかけていないため、cond_titleは存在しない


        if ($cond_title != '') {
            //検索されたら検索結果を取得する
            $posts = News::where('title',$cond_title)->get();
            //whereメソッドを使うと、newsテーブルの中のtitleカラムで$cond_title（ユーザーが入力した文字）に一致するレコードを全て取得することが可能。　取得したテーブルを$posts変数に代入している。　$cond_titleがあればそれに一致するレコードを、無ければ全てのレコードを取得することになる。

        } else {
        //それ以外は全てのニュースを取得する
        $posts = News::all();
        //これは、newモデルを使って、データベースに保存されている、newsテーブルのレコードを全て取得し、変数　$posts　に代入しているという意味

        }


        return view('admin.news.index',['posts' => $posts, 'cond_title' => $cond_title]);
        //return文で、index.blade.phpのファイルに取得したレコード（$posts）と、ユーザが入力した文字列（＄cond＿title）を渡し、ページを開く
        //Controllerで、Modelに対してWhereメソッドを指定して検索している。Whereへの引数で検索条件を設定している。検索条件となる名前が入力されていない場合は、登録してあるずべ手のデータを取得する
    }
}