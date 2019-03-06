<html>
<head>
  <title>いいねしたユーザー一覧</title>
  <link rel="stylesheet" href="/css/uikit.min.css" />
  <link rel="stylesheet" href="/css/position.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="/js/uikit.min.js"></script>
  <script src="/js/uikit-icons.min.js"></script>
  <header id='top'>
    <nav class="uk-navbar uk-margin-small-bottom">
    <div class="uk-container uk-container-center">
     <div class="uk-grid">
      <div class="uk-width-large-1-1">
        <ul class="uk-navbar-nav uk-hidden-small">
            <li><a href="/home">ホーム</a></li>
            @if($login_state)
            <li><a href='/logout'>ログアウト</a></li>
            @else
            <li><a href='/login'>ログイン</a></li>
            @endif
             <li><a href="/write_post">投稿</a></li>
        </ul>
      </div>
    </div>
  </div>
  </nav>
  </header>
</head>


<body>
  <div id='main'>
  @if($fav_userlist->count() == 0)
  <h3 class='uk-text'> いいねしたユーザーはいません </h3>
  @endif
  <h3 class='uk-text'> いいねしたユーザー </h3>
  <ui>
  @foreach($fav_userlist as $fav_user)
  <li>
    <a href = '/profile'><img src = '{{'https://avatars.githubusercontent.com/'.$fav_user->github_id}}' width =60pt height=60pt></a>
    <a href = '/profile'> {{$fav_user->github_id}}</a>
  </li>
  @endforeach
</ui>
  </div>
</body>
</html>
