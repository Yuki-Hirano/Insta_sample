<!html>
<head>

  <title>{{$user_name}}さんのプロフィール画面</title>
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
  <div>
  <h2>{{$user_name}}</h2>
  </div>
  <div>
  <img src={{$url}} height=120pt width=120pt>
  </div>
  いいね総数： {{$fav_count}}
  <br>
  @foreach($self_posts as $post)
     <!--<img src="{{ asset('storage/post/' . $post -> image_path) }}" height='auto' width='33%'>-->
     <img src="data:image/png;base64,<?= $post->image ?>"　height='auto' width=33%>
  @endforeach
</div>
</body>
</html>
