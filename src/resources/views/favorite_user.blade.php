<html>
<head>
  <title>いいねしたユーザー一覧</title>
  <a href='/'>ホーム</a>
  @if($login_state)
  <a href='logout'>ログアウト</a>
  @else
  <a href='login'>ログイン</a>
  @endif
  <a href='write_post'>投稿</a>
  <style>
  div {color:red;}
  </style>
</head>
<body>
  @if($fav_userlist->count() == 0)
  <div> いいねしたユーザーはいません <div>
  @endif
  @foreach($fav_userlist as $fav_user)
  <h2>
    <a href = '/profile'><img src = '{{'https://avatars.githubusercontent.com/'.$fav_user->github_id}}' withth =120pt height=120pt></a>
    <a href = '/profile'> {{$fav_user->github_id}}</a>
  <h2>
  @endforeach
</body>
</html>
