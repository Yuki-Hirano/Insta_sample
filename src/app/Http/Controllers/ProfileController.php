<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Socialite;
use Illuminate\Http\Request;
use App\Model\Post;
use App\Model\Favorite;

class ProfileController extends Controller
{
  public function profileViewing(Request $request, $user_name){
    $login_state = $request->session()->get('github_token', null);
    //$user = Socialite::driver('github')->userFromToken($login_state);
    //$app_user = $user->user['login'];
    $self_posts = Post::where('user_name', $user_name)
                  ->orderBy('created_at', 'desc')
                  ->get();
    $url = 'https://avatars.githubusercontent.com/' . $user_name;
    $img = file_get_contents($url);
    $fav_count = Favorite::join('posts', 'post_id','=','posts.id')->where('posts.user_name',$user_name)->count();

    return view('profile',
    ['user_name' => $user_name, 'self_posts' => $self_posts,'login_state' => $login_state, 'url' => $url, 'fav_count' => $fav_count]);
  }
}
