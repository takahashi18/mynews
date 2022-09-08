

{{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')


{{-- profile.blade.phpの@yield('title')に' プロフィール新規作成画面'を埋め込む --}}
@section('title', 'プロフィール新規作成')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Myプロフィール</h2>
                {{--name--}}
                <div class="form-group row">
                    <label class="col-md-2" for="title">氏名</label>
                    <div class="col-md-qo">
                        <input type="text" class="form-control" name="name" value="{{ old('name')}}">
                    </div>
                </div>
                {{--gender  radio:b--}}
                <div class="form-group row">
                    <label for="radio01" class="col-md-4 col-form-label text-md-right">性別</label>
                    <div class="col-md-3">
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineRadio01" name="radioGrp01" value="1">
                        <label class="form-check-label" for="inlineRadio01">男</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineRadio02"  name="radioGrp01" value="2" checked="checked">
                        <label class="form-check-label" for="inlineRadio02">女</label>
                        </div>
                    </div>
                </div>
                {{--hobby--}}
                <div class="form-group row">
                    <label class="co-md-2" for="body">趣味
                    </label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="body" rows="10">{{old('body') }}</textarea>
                    </div>
                </div>
                {{--introducation--}}
                <div class="form-group row">
                    <label class="co-md-2" for="body">自己紹介欄</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="body" rows="10">{{old('body') }}</textarea>
                    </div>
                </div>
                {{--rerode--}}
                <input type="submit" class="btn btn-pirmary" value="更新">
            </div>
        </div>
    </div>
@endsection
