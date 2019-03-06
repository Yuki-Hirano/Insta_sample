<!html>
<head>
<title>ホーム</title>

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
<!-- エラーメッセージ。なければ表示しない -->
@if ($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<div class="uk-container center">
@foreach($posts as $post)
<div class="uk-section uk-section-small uk-section-muted">
  <div class='uk-card ukcard-defalt uk-margin center'>
    <!--<a href='profile'>{{$post->user_name}}</a>-->
    <a href='profile/{{$post->user_name}}' class='uk-card-header'>{{$post->user_name}}</a>
    <br>
    <div class='uk-card-body'>
    <img src="{{ asset('storage/post/' . $post -> image_path) }}" height=300pt width=400pt><br>
    <span class='uk-text-bold uk-text-emphasis uk-text-large uk-text-left'>{{$post->caption}}</span>
  </div>
  <div class='uk-card-footer left'>
    <form  class='uk-form' action = "{{ url('favorite') }}" method = 'post'>
      {{ csrf_field() }}
      <input type = 'hidden' name = 'post_id' value ={{$post->id}}>
      @if ($post->favorites()->where('github_id',Socialite::driver('github')->userFromToken($login_state)->user['login'])->first())
      <button class='uk-icon-button' type='submit' name = 'fav_on' value = 0 >
        <img src='storage/icon/star_on.png'></img>
      </button>
      @else
      <button class='uk-icon-button' type='submit' name = 'fav_on' value = 1 >
        <img src='storage/icon/star_off.png'></img>
        </button>
      @endif
    </form>
  </div>
  <div class='uk-card-footer right'>
    <form  action = "{{ url('favorite_by') }}" method = 'post'>
      {{ csrf_field() }}
        <input type ='hidden' name = 'post_id' value ={{$post->id}}>
        <input type ='submit' class='uk-button uk-button-primary' value = 'いいねしたユーザー'>
    </form>
  </div>
</div>
</div>
<hr>
@endforeach
</div>

{{$posts->links()}}

</div>
</body>
</html>
