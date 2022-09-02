@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="login-box card">
                <div class="login-header card-header mx-auto">{{ __('messages.Login') }}</div>

                <div class="login-body card-body">
                    <form method="POST" action="{{ route('login') }}">
                        {{--route関数はURLを生成したりリダイレクトしたりするための関数。今回なら/loginというUrLを生成する--}}
                        @csrf
                        {{--CSRF対策のために用意されたBladeディレクティブ　※ディレクティブ：言語における構文のような役割を果たす　CSRFは『Cross Site Request Forgery』と呼ばれるWEBサイト攻撃の一つ。スクリプトなどを使い外部からフォーム送信をするもの。フォームに大量のコンテンツを送りつけるのに用いられる。フォーム以外からの送信を受け付けない必ず＠CSRFをフォーム内に用意しておく必要がある
                        ＜laravel：CSRF保護＞
                        --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">
                                {{ __('messages.E-Mail Address') }}
                            </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{$errors->has('email') ? ' is-invalid' : ''}}"  name="email" value="{{ old('email') }}" required autofocus>
                                {{--{{$〜}}は、三項演算子が使用されている
                                ＜条件式＞　？　＜真式/Ture＞：＜偽式/False＞
                                今回、何もエラーがなければ $errors->has('email') の値はNULLになるので : の右側が表示。（’’だから実際は何も表示されない）
                                エラーがある場合は、$errors->has('email') の値にエラーメッセージが代入されるので、” is-invalid” が出力
                                $errorsは、そのままエラーメッセージが格納されている変数
                                has（’email’）は、emailフィールドに値が存在しているかを判定する
                                ＜laravel：バリデージョン＞
                                --}}
                                @if ($errors ->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors ->first('email') }}</strong>
                                    </span>
                                @endif
                                {{--＠if／＠endifは、PHPのif分を意味する--}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">
                                {{ __('messages.Password') }}
                            </label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required >

                                @if($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('messages.Remember Me') }}
                                        {{--oldヘルパ関数は、セッションにフラッシュデータ（一時的にしか保存されないデータ）として入力されているデータを取得することができる。今回の場合フラッシュデータ＝直前までユーザーが入力した値のこと。直前のデータがない場合はNULLを返す--}}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('messages.Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
