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

                    <div class="form-group row">
                        <label class="col-md-2" for="name">氏名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $profile_form->name}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="gender" class="col-md-4 col-form-label text-md-right">性別</label>
                    </div>
                    <div>
                        <input type="radio" class="form-radio-input" name="gender" id="man" value="男性" {{ $profile_form->gender == '男性' ? 'checked' : '' }}>
                            <label class="form-radio-label" for="男性">男性</label>
                    </div>
                    <div>
                        <input type="radio" class="form-radio-input" name="gender" id="woman" value="女性" {{ $profile_form->gender == '女性' ? 'checked' : '' }}>
                            <label class="form-radio-label" for="女性">女性</label>
                    </div>

                    <div class="form-group row">
                        <label class="co-md-2" for="hobby">趣味
                        </label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="hobby" rows="10">{{$profile_form->hobby}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="co-md-2" for="introduction">自己紹介欄</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="10">{{ $profile_form->introduction }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $profile_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($profile_form->profilehistories != NULL)
                                @foreach ($profile_form->profilehistories as $history)
                                    <li class="list-group-item">{{ $history->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
