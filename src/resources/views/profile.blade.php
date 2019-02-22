<!html>
<head>
  <title>{{$user_name}}さんのプロフィール画面</title>
  <a href='/'>ホーム</a>
  @if($login_state)
  <a href='logout'>ログアウト</a>
  @else
  <a href='login'>ログイン</a>
  @endif
  <a href='write_post'>投稿</a>
</head>
<body>
  <div>
  <h2>{{$user_name}}</h2>
  </div>
  <div>
  <img src={{$url}} height=120pt width=120pt>
  </div>
  いいね総数： {{$fav_count}}
  <br>
  @foreach($self_posts as $post)
     <img src="{{ asset('storage/post/' . $post -> image_path) }}" height=300pt width=400pt>
  @endforeach
</body>
</html>
