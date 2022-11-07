@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="image">
                                    @if ($headline->image_path)
                                    <img src="{{ asset('storage/image/'.$headline->image_path) }}">
                                    @endif
                                </div>
                                <div class="title p-2">
                                    <h1>{{ Str::limit($headline->title,70) }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="body mx-auto">{{ Str::limit($headline->body,650) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach ($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日')}}
                                </div>
                                <div class="title">
                                    {{ Str::limit($post->title,150) }}
                                </div>
                                <div class="body mt-3">
                                    {{ Str::limit($post->body,1500) }}
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                <img src="{{ asset('storage/image/'.$post->image_path) }}" alt="写真">
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
@endsection

{{--
    ■if文の中で!is_null($headline)が出てきました。is_nullというメソッドは、
    nullであればturu、それ以外であればfalseを返す　というメソッドになっている
    そして、！は否定演算子と呼ばれ、true、falseを反転する　という意味を持っている

    要するに、@if !is_null($headline)は、$headlineが空なら飛ばして（実行しない）データがあれば実行するという意味になる。

    ■画像を表示するコードは、\<img scr="{{ assset('storage/image'.$headline->image_path) }}">
    assetは、publicディレクトリのパスをを返すヘルパとなっている
    ヘルパとはviewファイルで使えるメソッドのこと
    このメソッドは現在のURLのスキーマ（http、https）を使いアセットへの
    URLを生成するメソッドになっている

    ■$headline->image_pathは、保存した画像のファイル名が入っている
    'storage/image/' . $headline->image_pathの「.」は何を意味するのか
    ＝＞文字列を結合する結合演算子と呼ばれるもの、つまり画像のパスを返している
    これで画像が保存されているパスのURLを生成することができた。

    ■{{ $post->updated_at->format('Y年m月d日') }}
    formatメソッドはその名の通りフォーマットするためのメソッド
    update_atカラムに保存されているデータは「2018−12−08 09:47:27.0　UTC((＋00:00)」という形になっているためそのまま表示すると見づらい
    formatメソッドを使えば、簡単に日付のフォーマットを変更することができる
    --}}

