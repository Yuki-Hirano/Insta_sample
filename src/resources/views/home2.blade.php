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
<!-- エラーメッセージ。なければ表示しない -->
@if ($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif


@foreach($posts as $post)
<div>
  　<h1>{{$post->caption}}</h1>
    <a href='profile'>{{$post->user_name}}</a>
    <br>
    <img src="{{ asset('storage/post/' . $post -> image_path) }}" height=300pt width=400pt>
</div>
@endforeach


</body>
</html>
