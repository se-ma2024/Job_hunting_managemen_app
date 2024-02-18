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
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
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

        .hamburger {
            cursor: pointer;
            position: absolute;
            top: 15px;
            right: 20px;
        }

        .hamburger .row {
            width: 30px;
            height: 3px;
            background-color: #333;
            margin: 5px 0;
        }

        .menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            display: none;
        }

        .menu {
            position: fixed;
            top: 0;
            right: 0;
            width: 200px;
            height: 100%;
            background-color: #fff;
            z-index: 1001;
            transform: translateX(100%);
            transition: transform 0.3s ease;
            padding: 20px;
        }

        .menu.active {
            transform: translateX(0);
        }

        .menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu ul li {
            padding: 10px 0;
        }

        .menu ul li a {
            text-decoration: none;
            color: #333;
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
        <!-- メニューオーバーレイ -->
        <div class="menu-overlay" id="menuOverlay"></div>
        <!-- メニュー -->
        <nav class="menu" id="menu">
            <ul>
                <li><a href="{{ route('index') }}">ホーム</a></li>
                <li><a href="{{ route('showProfile') }}">プロフィール</a></li> <!-- プロフィール画面へのリンク -->
                <li><a href="#">お問い合わせ</a></li>
                <!-- 追加のメニュー項目をここに追加 -->
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1>プロフィール</h1>
        <div class="profile-info">
            <h2>基本情報</h2>
            <h3>名前</h3>
            <p>{{ $profile[0]->name }}</p>
            <h3>学校名</h3>
            <p>{{ $profile[0]->school_name }}</p>
            <h3>TEL</h3>
            <p>{{ $profile[0]->phone_number }}</p>
            <h3>Email</h3>
            <p>{{ $profile[0]->email }}</p>
        </div>

        <div>
            <h2>就活関連</h2>
            <h3>将来の目標</h3>
            <p>{{ $profile[0]->future_goals }}</p>
            <h3>就活の軸</h3>
            <p>{{ $profile[0]->core_values }}</p>
            <h3>自己PR</h3>
            <p>{{ $profile[0]->self_pr }}</p>
        </div>

        <form action="{{ route('editProfile') }}" class="edit-button" method="GET">
            <button type="submit">編集</button>
        </form>
        
        <h2>署名</h2>
        <div class="signature">
            ===========================================<br>
            {{ $profile[0]->name }}<br>
            {{ $profile[0]->school_name }}<br>
            TEL: {{ $profile[0]->phone_number }}<br>
            Email: {{ $profile[0]->email }}<br>
            ===========================================<br>
        </div>
        <button class="copy-button" onclick="copyToClipboard()">署名をコピー</button>
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