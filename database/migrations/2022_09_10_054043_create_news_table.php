<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     *
     * @return void
     */

    //title と　body と　image_path を追記
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title'); //ニュースのタイトルを保存するカラム
            $table->string('body'); //ニュースの本文を保存するカラム
            $table->string('image_path')->nullable(); //画像のパスを保存するカラム
            $table->timestamps();
        });
    }

    //関数UPにはマイグレーション実行時のコードを書く
    //ここでは’id’、’title’、’body’、’image_path’、’timetamps’、の５つのカラムを持つ’news’というテーブルの作成

    //image_pathの右にある　->nullable()という記述は、画像のパス空でも保存できるという意味。他の４つは全て保存時に必ず値が入るカラムに設定される。

    // idとtimestampsはレコードが新規作成される際に自動で埋まる、titleとbodyは入力時に必須チェックをしているから、必ず値が入る

    //関数downいは、マイグレーションの取り消しを行うためのコードを書く。ここではもし、newsというテーブルが存在すれば削除すると書かれている

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
};

//　マイグレーションの準備完了→ コマンドにてマイグレーションの実行をする
// ＄php　artisan　migration
// ＄/Applications/MAMP/Library/bin/mysql -u root -p
// ＄describe mynews.news;←これでnewsのテーブル構成が表示される

//ロールバック　：　テーブル名、カラム名、データ型などが間違っていても直前のマイグレーション操作を取り消すことができる
//　