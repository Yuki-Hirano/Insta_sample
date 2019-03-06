<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Model\Favorite;


class FavoriteController extends Controller
{
    //
    public function registerFav(Request $request){
      $token = $request->session()->get('github_token', null);
      $user = Socialite::driver('github')->userFromToken($token);
      $now = date("Y/m/d H:i:s");

      if($request->fav_on == 1){
        Favorite::insert(['github_id' => $user->user['login'], 'post_id' => $request->post_id , 'created_at' => $now]);
      }else{
        Favorite::where([['github_id', $user->user['login']], ['post_id', $request->post_id]])->delete();
      }

      return redirect('/home');
    }

    public function showFavBy(Request $request){
      $fav_userlist = Favorite::where('post_id',$request->post_id)->get();
      $login_state = $request->session()->get('github_token', null);
      return view('favorite_user',['fav_userlist'=>$fav_userlist,'login_state'=>$login_state]);
    }

}
