<!html>
<head>
  <title>ホーム</title>
  <a href='/'>ホーム</a>
  @if($login_state)
  <a href='logout'>ログアウト</a>
  @else
  <a href='login'>ログイン</a>
  @endif
  <a href='write_post'>投稿</a>

  <style>
  button.on{color: red;}
  </style>
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
    <form  action = "{{ url('favorite') }}" method = 'post'>
      {{ csrf_field() }}
      <input type = 'hidden' name = 'post_id' value ={{$post->id}}>
      @if ($post->favorites()->where('github_id',Socialite::driver('github')->userFromToken($login_state)->user['login'])->first())
      <button type='submit' class='on'  name = 'fav_on' value = 0 >いいね</button>
      @else
      <button type='submit' class='off' name= 'fav_on' value = 1>いいね</button>
      @endif
    </form>
    <form  action = "{{ url('favorite_by') }}" method = 'post'>
      {{ csrf_field() }}
        <input type = 'hidden' name = 'post_id' value ={{$post->id}}>
        <input type ='submit' value = 'いいねしたユーザー'>
    </form>
</div>
@endforeach


</body>
</html>
