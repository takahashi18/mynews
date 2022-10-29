<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//以下の追加でProfile:modelが扱えるようになる
use App\Models\Profile;

use App\Models\Profilehistory;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function add()
    {
        return view('admin.profile.create');
        //return 戻り値を指定：returnで返される値がそのアドレスにアクセスした際表示される

    }
    public function create(Request $request)
    {
        //varidationを行う
        $this->validate($request, Profile::$rules);

        $profile = new Profile;
        $form = $request->all();

        //フォームから送信されてきた_tokenを削除する
        unset($form['_token']);

        //データベースを保存する
        $profile->fill($form);
        $profile->save();

         //admin/profile/createにリダイレクトする
        return redirect('admin/profile/create');
    }
// indexAction の追加　
    public function index(Request $request)
    {
        $cond_name = $request->cond_name;
        if ($cond_name != '') {
            $posts = Profile::where('name', $cond_name)->get();
        } else {
            $posts = Profile::all();
        }
        return view('admin.profile.index',['posts' => $posts, 'cond_name' => $cond_name]);
    }
//ここまで

//4-18 課題

    public function edit(Request $request)
    {
        //ProfileModel からデータを取得する
        $profile = Profile::find($request->id);
        if (empty($profile)) {
            abort(404);
        }
        return view('admin.profile.edit' , ['profile_form' => $profile]);
    }
    
    public function update(Request $request)
    {
        //Varidationをかける
        $this->validate($request,Profile::$rules);
        //Profile Modelからデータを取得する
        $profile=Profile::find($request->id);
        //送信されてきたフォームデータを格納する
        $profile_form = $request->all();
        
        unset($profile_form['_token']);

        $profile->fill($profile_form)->save();
        
        $history = new Profilehistory;
        $history->profile_id = $profile->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
        return redirect('admin/profile/');
    }
    
    public function delete(Request $request)
    {

        $profile = Profile::find($request->id);
        
        $profile ->delete();
        
        return redirect('admin/profile');
    }
}