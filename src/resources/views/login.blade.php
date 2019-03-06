<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>ログイン画面</title>
  <link rel="stylesheet" href="/css/uikit.min.css" />
  <link rel="stylesheet" href="/css/position.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="/js/uikit.min.js"></script>
  <script src="/js/uikit-icons.min.js"></script>
  <meta charset="utf-8">
</head>
<body id='login_button'>
      <div class='uk-container uk-container-expand center'>
      <a class='uk-button uk-button-primary' href="/login/github">githubアカウントでログイン</a>
      </div>
 </body>
</html>
