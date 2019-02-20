<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Model;
use Socialite;
use App\Model\Post;

class HomeController2 extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * ファイルアップロード処理
     */
    public function upload(Request $request)
    {
        $token = $request->session()->get('github_token', null);
        $user = Socialite::driver('github')->userFromToken($token);

        $this->validate($request, [
            'file' => [
                // 必須
                'required',
                // アップロードされたファイルであること
                'file',
                // 画像ファイルであること
                'image',
                // MIMEタイプを指定
                'mimes:jpeg,png,gif',
                //画像サイズ
                'max:60000'
            ],
            'caption' => [
              'max:200'
            ]
        ]);

        if ($request->file('file')->isValid([])) {
            $path = $request->file->store('public/post');
            $now = date("Y/m/d H:i:s");
            //Post::insert(['user_name' => $user->nickname, 'image_path' => basename($path), 'caption' => $request->caption]);
            Post::insert(['user_name' => $user->nickname, 'image_path' => basename($path),
                          'caption' => $request->caption, 'created_at' => $now, 'updated_at' => $now]);
            $posts = Post::all(); // 全データの取り出し
            //return view('home')->with('filename', basename($path));
            return view('home2',['posts'=>$posts]);
            //return view('home2')->with(['path'=>basename($path), 'caption'=>$request->caption]);

        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors();
        }
    }

    public function viewing()
    {
      $posts = Post::all(); // 全データの取り出し
      return view('home2',['posts'=>$posts]);
    }
}
