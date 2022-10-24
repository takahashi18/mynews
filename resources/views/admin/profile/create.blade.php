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

                <form action="{{action([App\Http\Controllers\Admin\ProfileController::class,'create'])}}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {{--name--}}
                    <div class="form-group row">
                        <label class="col-md-2" for="name">氏名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name')}}">
                        </div>
                    </div>
                    {{--gender  RadioB --}}
                    <div class="form-group row">
                        <label for="gender" class="col-md-4 col-form-label text-md-right">性別</label>
                    </div>
                    <div>
                        <input type="radio" class="form-radio-input" name="gender" id="man" value="男性" {{ old('gender') == 'man' ? 'checked' : '' }}>
                            <label class="form-radio-label" for="男性">男性</label>
                    </div>
                    
                    <div>
                        <input type="radio" class="form-radio-input" name="gender" id="woman" value="女性" {{ old('gender') == 'woman' ? 'checked' : '' }}>
                            <label class="form-radio-label" for="女性">女性</label>
                    </div>

                    {{--hobby--}}
                    <div class="form-group row">
                        <label class="co-md-2" for="hobby">趣味
                        </label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="hobby" rows="10">{{old('hobby') }}</textarea>
                        </div>
                    </div>
                    {{--introducation--}}
                    <div class="form-group row">
                        <label class="co-md-2" for="introduction">自己紹介欄</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="10">{{old('introduction') }}</textarea>
                        </div>
                    </div>
                    {{--rerode--}}
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-pirmary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection
