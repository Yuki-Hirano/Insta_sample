<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Model;
use Socialite;
use App\Model\Post;
use Illuminate\Support\Facades\Auth;


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
      $login_state = $request->session()->get('github_token', null);
      $posts = Post::simplePaginate(10); // 全データの取り出し
      $posts->setPath('/home');
      return view('home',['posts' => $posts,'login_state' => $login_state]);

    }

    public function redirectToPostpage(Request $request)
    {
      $login_state = $request->session()->get('github_token', null);
      return view('toukou',['login_state' => $login_state]);
    }
}
