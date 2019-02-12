<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Bbs;

class BbsController extends Controller
{
    // Indexページの表示
    public function index() {
      $bbs = Bbs::all();
      return view('bbs.index', ["bbs" => $bbs]);
    }

    // 投稿された内容を表示するページ
    public function create(Request $request) {

      // バリデーションチェック
        $request->validate([
            'name' => 'required|max:10',
            'comment' => 'required|min:5|max:140',
        ]);

        // 投稿内容の受け取って変数に入れる
        $name = $request->input('name');
        $comment = $request->input('comment');

        Bbs::insert(["name" => $name, "comment" => $comment]);

        // 変数をビューに渡す
        return view('bbs.index')->with([
            "name" => $name,
            "comment"  => $comment,
        ]);
    }

}
