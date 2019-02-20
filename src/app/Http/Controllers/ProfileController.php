<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Model;

use App\Http\Controllers\Controller;
use Socialite;
use Illuminate\Http\Request;
use App\Model\Post;

class ProfileController extends Controller
{
  public function top(Request $request){
    $token = $request->session()->get('github_token', null);
    $user = Socialite::driver('github')->userFromToken($token);
  $self_posts = Post::where('user_name', $user->nickname)
                ->orderBy('created_at', 'desc')
                ->get();
  //ToDo:アイコン画像のパス、いいね総数をviewへ渡す実装
  return view('profile',['user_name' => $user->nickname, 'self_posts' => $self_posts]);
}
}
