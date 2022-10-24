@extends('layouts.profile')
@section('title','プロフィール編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール編集</h2>
                <form action="{{ action([App\Http\Controllers\Admin\ProfileController::class,'update'])}}" method="post" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" name="name" value="{{ $profile_form->name}}">
                        </div>
                    </div>
                    
                    {{--gender  RadioB --}}
                    <div class="form-group row">
                        <label for="gender" class="col-md-4 col-form-label text-md-right">性別</label>
                    </div>
                    <div>
                        <input type="radio" class="form-radio-input" name="gender" id="man" value="男性" {{ $profile_form->gender == '男性' ? 'checked' : '' }}>
                            <label class="form-radio-label" for="男性">男性</label>
                    </div>
                    <div>
                        <input type="radio" class="form-radio-input" name="gender" id="woman" value="女性" {{ $profile_form->gender == '男性' ? 'checked' : '' }}>
                            <label class="form-radio-label" for="女性">男性</label>
                    </div>

                    {{--hobby--}}
                    <div class="form-group row">
                        <label class="co-md-2" for="hobby">趣味
                        </label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="hobby" rows="10">{{$profile_form->hobby}}</textarea>
                        </div>
                    </div>
                    {{--introducation--}}
                    <div class="form-group row">
                        <label class="co-md-2" for="introduction">自己紹介欄</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="10">{{ $profile_form->introduction }}</textarea>
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

{{--

    <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MyProfileEdit</title>
    </head>
    <body>
        <h1>Myプロフィール編集画面</h1>
    </body>
</html>

--}}