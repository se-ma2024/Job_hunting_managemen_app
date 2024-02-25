<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プロフィール</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }

        header h1 {
            margin: 0;
            padding-right: 100px;
            margin-left: auto;
            margin-right: auto;
        }

        .hamburger {
            cursor: pointer;
            margin-right: 20px;
        }

        .hamburger .row {
            width: 30px;
            height: 3px;
            background-color: #fff;
            margin: 5px 0;
        }

        .menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none;
        }

        .menu {
            position: fixed;
            top: 0;
            left: 0;
            width: 200px;
            height: 100%;
            background-color: #333;
            z-index: 1001;
            transform: translateX(-100%);
            transition: transform 0.3s ease;
            padding-top: 50px;
        }

        .menu.active {
            transform: translateX(0);
        }

        .menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        .menu ul li {
            padding: 20px 0;
        }

        .menu ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 18px;
        }

        .container {
            max-width: 800px;
            margin: 80px auto 20px;
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .container h1 {
            margin: 0;
            text-align: center;
            color: #000;
            margin-bottom: 30px;
            font-size: 36px;
        }
        h2 {
            color: #666;
            font-size: 24px;
            margin-top: 30px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }
        h3 {
            color: #444;
            font-size: 20px;
            margin-top: 20px;
        }
        p {
            font-size: 18px;
            color: #555;
            line-height: 1.6;
        }
        .signature {
            padding-top: 20px;
            text-align: center;
            font-style: italic;
            color: #888;
        }
        .edit-button {
            text-align: center;
            margin-top: 30px;
        }

        .edit-button button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 12px 24px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
            max-width: 200px;
        }

        .edit-button button:hover {
            background-color: #45a049;
        }
        .copy-button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 12px 24px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 30px;
            display: block;
            width: 100%;
            max-width: 200px;
            margin: 30px auto 0;
        }
        .copy-button:hover {
            background-color: #45a049;
        }

        .container button[type="submit"],
        a {
            display: block;
            width: calc(100%);
            padding: 10px;
            box-sizing: border-box;
            text-align: center;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .container button[type="submit"]:hover,
        a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <header>
        <!-- ハンバーガーメニューのアイコン -->
        <div class="hamburger" id="hamburger">
            <div class="row"></div>
            <div class="row"></div>
            <div class="row"></div>
        </div>
        <h1>企業情報管理アプリケーション</h1>
        <div class="menu-overlay" id="menuOverlay"></div>
        <nav class="menu" id="menu">
            <ul>
                <li><a href="{{ route('index') }}">ホーム</a></li>
                <li><a href="{{ route('showProfile') }}">プロフィール</a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a></li>
                <!-- お問い合わせやその他のメニュー項目をここに追加 -->
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1>プロフィール</h1>
        @if($profile)
            <div class="profile-info">
                <h2>基本情報</h2>
                <h3>名前</h3>
                <p>{{ $profile->name }}</p>
                <h3>学校名</h3>
                <p>{{ $profile->school_name }}</p>
                <h3>TEL</h3>
                <p>{{ $profile->phone_number }}</p>
                <h3>Email</h3>
                <p>{{ $profile->email }}</p>
            </div>

            <div>
                <h2>就活関連</h2>
                <h3>将来の目標</h3>
                <p>{{ $profile->future_goals }}</p>
                <h3>就活の軸</h3>
                <p>{{ $profile->core_values }}</p>
                <h3>自己PR</h3>
                <p>{{ $profile->self_pr }}</p>
            </div>

            <form action="{{ route('editProfile') }}" class="edit-button" method="GET">
                <button type="submit">編集</button>
            </form>
            
            <h2>署名</h2>
            <div class="signature">
                ===========================================<br>
                {{ $profile->name }}<br>
                {{ $profile->school_name }}<br>
                TEL: {{ $profile->phone_number }}<br>
                Email: {{ $profile->email }}<br>
                ===========================================<br>
            </div>
            <button class="copy-button" onclick="copyToClipboard()">署名をコピー</button>
        @else
            <form action="{{ route('createProfile') }}" class="edit-button" method="GET">
                <button type="submit">作成</button>
            </form>
        @endif
    </div>
    <script>
        function copyToClipboard() {
            const textToCopy = document.querySelector('.signature').innerText.trim();
            navigator.clipboard.writeText(textToCopy)
                .then(() => alert('テキストがコピーされました'))
                .catch(() => alert('テキストのコピーに失敗しました'));
        }
        
        // ハンバーガーメニューの表示・非表示を制御するJavaScript
        document.addEventListener('DOMContentLoaded', function() {
            const hamburger = document.getElementById('hamburger');
            const menu = document.getElementById('menu');
            const menuOverlay = document.getElementById('menuOverlay');

            hamburger.addEventListener('click', function() {
                menu.classList.toggle('active');
                menuOverlay.style.display = menu.classList.contains('active') ? 'block' : 'none';
            });

            menuOverlay.addEventListener('click', function() {
                menu.classList.remove('active');
                menuOverlay.style.display = 'none';
            });
        });
    </script>
</body>
</html>
