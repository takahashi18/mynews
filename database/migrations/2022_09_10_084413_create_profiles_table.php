<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->string('name'); //名前を保存するカラム
            $table->string('gender'); //性別を保存するカラム
            $table->string('hobby'); //趣味を保存するカラム
            $table->string('introduction'); //自己紹介を保存するカラム
        });
        //ここでは、’name’,'gender',’hobby',’introduction’,の4つのカラムを持つ’profile’というテーブルの作成
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         //関数downいは、マイグレーションの取り消しを行うためのコードを書く。ここではもし、newsというテーブルが存在すれば削除すると書かれている

        Schema::dropIfExists('profiles');
    }
};  }
};