<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Model\Post;


class PostController extends Controller
{
    //
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
            $image = base64_encode(file_get_contents($request->file->getRealPath()));
            $path = $request->file->store('public/post');
            $now = date("Y/m/d H:i:s");
            //Post::insert(['user_name' => $user->nickname, 'image_path' => basename($path), 'caption' => $request->caption]);
            //Post::insert(['user_name' => $user->nickname, 'image_path' => basename($path),
            Post::insert(['user_name' => $user->nickname, 'image' => $image,
                          'caption' => $request->caption, 'created_at' => $now, 'updated_at' => $now]);
            $posts = Post::simplePaginate(10); // 全データの取り出し
            $login_state = $request->session()->get('github_token', null);
            return view('home',['posts'=>$posts,'login_state' => $login_state]);

        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors();
        }
    }

}
