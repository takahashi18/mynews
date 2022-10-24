{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'ニュースの新規作成')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ニュース新規作成</h2>
                {{---カリキュラムには、form action記載が{{ action(~)　}}であるが、{ action(~)}での表記にて処理可能となった　下記部分--}}
                <form action="{{ action([App\Http\Controllers\Admin\ProfileController::class,'create'])}}" method="post" enctype="multipart/form-data">
                    {{--：異なる形での処理：
                        form action="　action('Admin\NewsController@create "
                    --}}
                    @if (count($errors) > 0)
                    {{--
                        $errors は validate で弾かれた内容を記憶する配列のこと
                        countメソッドは配列の個数を返すメソッドになっている
                        もし、エラーがなければ $errors は null を返すので、count($errors) は 0 を返す
                        --}}
                        <ul>
                            @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                            {{--foreach は、配列の数だけループする--}}
                            @endforeach
                        </ul>
                    @endif

                    <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{old('body') }}</textarea>
                        </div>
                        <div class="form-group row" >
                            <label class="col-md-2" for="image">画像</label>
                            <div class="col-md-10">
                                <input type="file" class="form-control-file" name="image">
                            </div>
                        </div>
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-pirmary" value="更新">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
