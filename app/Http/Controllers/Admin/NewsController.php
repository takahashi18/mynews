<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //addというActionをNewsControllerに追加（4−9）
    public function add()
    {
        return view('admin.news.create');

        //return 戻り値を指定：returnで返される値がそのアドレスにアクセスした際表示される
        //view関数で戻り値の用意をしている　このviewを使うことでviewフォルダのプレートエンジンの使用が可能
    }
}