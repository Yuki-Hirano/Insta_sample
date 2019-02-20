<!html>
<head>
  <a href='upload'>ホーム</a>
  @isset($nickname)
  <a href='logout'>ログアウト</a>
  @else
  <a href='login'>ログイン</a>
  @endisset
  <a href='write_post'>投稿</a>
</head>
<body>
  <h2>{{$user_name}}</h2>
  @foreach($self_posts as $post)
     <img src="{{ asset('storage/post/' . $post -> image_path) }}" height=300pt width=400pt>
  @endforeach
</body>
</html>
