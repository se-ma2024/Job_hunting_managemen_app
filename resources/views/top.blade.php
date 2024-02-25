<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>就活情報管理アプリケーション</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 800px;
            margin: -60px auto 20px;
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            font-size: 18px;
            margin: 10px;
            cursor: pointer;
            border: none;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .btn i {
            margin-right: 10px;
        }
    </style>
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
