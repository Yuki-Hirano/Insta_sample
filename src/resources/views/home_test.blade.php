<!-- エラーメッセージ。なければ表示しない -->
@if ($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<!-- フォーム -->
<form action="{{ url('/') }}" method="POST" enctype="multipart/form-data">

  <!-- アップロードした画像。なければ表示しない -->
  @isset ($images)
  @foreach ($images as $image)
  <div>
      <img src="{{ asset('storage/profile/' . basename($image->path)) }}" height=300pt width=400pt>
  </div>
  @endforeach
  @endisset

    <label for="photo">画像ファイル:</label>
    <input type="file" class="form-control" name="file">
    <br>
    <hr>
    {{ csrf_field() }}
    <button class="btn btn-success"> Upload </button>
</form>
