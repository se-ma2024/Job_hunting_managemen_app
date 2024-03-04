<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>就活情報管理アプリケーション</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('../resources/css/top.css') }}">
</head>
<body>
    <div class="container">
        <h1>就活情報管理アプリケーション</h1>
        <p>ようこそ！アカウントを作成してログインしましょう。</p>
        <a href="{{ route('register') }}" class="btn"><i class="fas fa-user-plus"></i> 新規会員登録</a>
        <a href="{{ route('login') }}" class="btn"><i class="fas fa-sign-in-alt"></i> ログイン</a>
    </div>
</body>
</html>
