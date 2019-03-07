<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>投稿画面</title>
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

  <!-- フォーム -->
  <form action="{{ url('/home') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <label for="photo"></label>
    <div class="imgInput">
    <input type="file" class="form-control" name="file">
    </div>
    <br>
    キャプション:<br>
    <textarea name="caption" rows="4" cols="40"></textarea>
    <hr>
    <button class="btn btn-success"> 投稿 </button>
  </form>


  <script>
  $(function(){
      var setFileInput = $('.imgInput');

      setFileInput.each(function(){
          var selfFile = $(this),
          selfInput = $(this).find('input[type=file]');

          selfInput.change(function(){
              var file = $(this).prop('files')[0],
              fileRdr = new FileReader(),
              selfImg = selfFile.find('.imgView');

              if(!this.files.length){
                  if(0 < selfImg.size()){
                      selfImg.remove();
                      return;
                  }
              } else {
                  if(file.type.match('image.*')){
                      if(!(0 < selfImg.size())){
                          selfFile.append('<img alt="" class="imgView" height=300pt width=400pt>');
                      }
                      var prevElm = selfFile.find('.imgView');
                      fileRdr.onload = function() {
                          prevElm.attr('src', fileRdr.result);
                      }
                      fileRdr.readAsDataURL(file);
                  } else {
                      if(0 < selfImg.size()){
                          selfImg.remove();
                          return;
                      }
                  }
              }
          });
      });
  });
  </script>
</div>
</body>
</html>
