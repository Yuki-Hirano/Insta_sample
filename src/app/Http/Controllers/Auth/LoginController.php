<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;// 追加！
use Illuminate\Http\Request;// 追加！
use Illuminate\Support\Facades\DB;
use App\Model\Github_user;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /**
    *ログイン状態ならhomeへリダイレクト
    *そうでなければログインボタンの表示
    */

    public function redirectToInitialpage(Request $request)
    {
      /*
      $login_state = $request->session()->get('github_token', null);
      if($login_state){
        return view('home',['posts' => [], 'login_state' => $login_state]);
      }else{
      */
        return view('login');
      //}
    }

    /**
     * GitHubの認証ページヘユーザーをリダイレクト
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()// 追加！
    {
        return Socialite::driver('github')->scopes(['read:user', 'public_repo'])->redirect();
    }

    /**
     * GitHubからユーザー情報を取得
     *
     * @return \Illuminate\Http\Response
     */
     public function handleProviderCallback(Request $request)
     {
         $github_user = Socialite::driver('github')->user();

         $now = date("Y/m/d H:i:s");
         //question: what is the difference of following two lines? (The latter one does not work well)
         $app_user = DB::select('select * from public.github_users where github_id = ?', [$github_user->user['login']]);
         //$app_user = Github_user::where('github_id', $github_user->user['login'])->get();
         if (empty($app_user)) {
             //Github_user::insert(['github_id' => $github_user->user['login'],'icon_url' => $github_user->user['avatar_url'],'created_at' => $now, 'updated_at' => $now]);
             Github_user::insert(['github_id' => $github_user->user['login'],'created_at' => $now, 'updated_at' => $now]);
         }
         $request->session()->put('github_token', $github_user->token);

         return redirect('/home');
     }

     public function Logout(Request $request){
       $request->session()->flush();
       return redirect('login');
     }

}
