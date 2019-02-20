<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <a href='upload'>ホーム</a>
  @isset($nickname)
  <a href='logout'>ログアウト</a>
  @else
  <a href='login'>ログイン</a>
  @endisset
  <a href='write_post'>投稿</a>

  <title>投稿画面</title>
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

  <!-- フォーム -->
  <form action="{{ url('upload') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <label for="photo">写真を選択:</label>
    <div class="imgInput">
    <input type="file" class="form-control" name="file">
    </div>
    <br>
    キャプション:<br>
    <textarea name="caption" rows="4" cols="40"></textarea>
    <hr>
    <button class="btn btn-success"> 投稿 </button>
  </form>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
</body>
</html>
