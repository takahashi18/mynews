<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Model でデータを保存する前に、フォームからデータを送信されてきた値が正しいかどうか確認が必要な場合がある。　例えば、ニュースへ追加するときに、タイトルが入力されていなかった場合は不完全なデータを登録してしまう。このようなデータの不備をあらかじめ防ぐために検証する仕組みがバリデーション。Validation を設定するにはたくさんの方法があるが、今回は Model に定義する

class News extends Model
{
    use HasFactory;
    //上記use文は削除せずに記載したままにする

    //追記
    protected $guarded = array('id');

    //追記
    public static $rules = array(
        'title' =>'required',
        'body' =>'required',
    );
}

// バリデーションでデータが異常であることを見つけたときには、データを保存せずに入力フォームへ戻すようにする。戻った先の画面では、データを登録できなかった理由を表示する