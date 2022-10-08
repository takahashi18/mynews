@extends('layouts.admin')
@section('title', '登録ずみニュースの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>ニュース一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                {{-- <a href="{{ action(Adimn\NewsController@add) }}" role="button" class="btn btn-primary">新規作成</a> --}}
                <a href="" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                {{-- <form action="{{action('Admin\NewsController@index') }}" method="get"> --}}
                <form action="" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="text" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">タイトル</th>
                                <th width="50%">本文</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $news)
                                <tr>
                                    <th>{{ $news->id}}</th>
                                    <td>{{ Str::limit($news->title,100) }}</td>
                                    <td>{{ Str::limit($news->body,250) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\NewsController@edit',['id' => $news->id])}}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\NewsController@delete',['id'=> $news->id] )}}">削除</a>
                                        </div>
                                    </tr>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--
    今回初めて出てくるメソッド　Str::limit()
    ・Str::limit()は、文字列を指定した数値で切り詰めるというメソッド
    注意が必要：文字の数は半角で認識するようになっている
    全角の文字は（２文字）として認識される

    Ex))　Str::limit("2018/12/13”,7)　結果は「2018/12」の７文字
        　Str::limit("2018年12月13日”,7)　結果は「2018年1」の７文字　全角「年」が２文字扱い

        Str::limit($news->title,100)の場合は、タイトルが全て全角なら最大５０文字まで表示可能

        取得したデータは、Viewテンプレートで処理される
        ＠foreach　を使って取得したデータの一つ一つを処理し、各データのIDと名前、メールアドレスを表示している
        ＠foreach　はPHPの　foreach ではなく　bladeの構文だが、使用方法に大きな差はなし。
        ※ 配列をループ処理したいときに使う（php：foreach文）
    --}}