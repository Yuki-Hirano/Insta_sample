<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Model\Image;

class HomeController_tutorial extends Controller
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
        $this->validate($request, [
            'file' => [
                // 必須
                'required',
                // アップロードされたファイルであること
                'file',
                // 画像ファイルであること
                'image',
                // MIMEタイプを指定
                'mimes:jpeg,png',
            ]
        ]);

        if ($request->file('file')->isValid([])) {
            $path = $request->file->store('public/profile');
            Image::insert(["path" => $path]);
            $images = Image::all(); // 全データの取り出し
            //return view('home')->with('filename', basename($path));
            return view('home',['images'=>$images]);

        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors();
        }
    }
}
