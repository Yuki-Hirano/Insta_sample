<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Model;
use Socialite;
use App\Model\Post;


class HomeController extends Controller
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


    public function viewing(Request $request)
    {
      $posts = Post::all(); // 全データの取り出し
      $login_state = $request->session()->get('github_token', null);
      if($login_state == null){
        return redirect('login');
      }else{
      return view('home',['posts' => $posts,'login_state' => $login_state]);
    }
    }

    public function redirectToPostpage(Request $request)
    {
      $login_state = $request->session()->get('github_token', null);
      return view('toukou',['login_state' => $login_state]);
    }
}
