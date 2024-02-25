<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プロフィール編集</title>
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
            font-size: 2em;
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
        form {
            margin-top: 30px;
        }
        label {
            display: block;
            font-size: 20px;
            color: #444;
            margin-bottom: 10px;
        }
        input[type="text"],
        textarea {
            width: 98%;
            padding: 10px;
            font-size: 18px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }
        input[type="submit"] {
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
        }
        input[type="submit"]:hover {
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
        <h1>プロフィール編集</h1>
        <form action="{{ route('addProfile') }}" method="POST">
            @csrf
            <label for="name">名前:</label>
            <input type="text" id="name" name="name" required>
            <label for="school_name">学校名:</label>
            <input type="text" id="school_name" name="school_name" required>
            <label for="phone_number">TEL:</label>
            <input type="text" id="phone_number" name="phone_number" required>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            <label for="future_goals">将来の目標:</label>
            <textarea id="future_goals" name="future_goals" rows="4" required></textarea>
            <label for="core_values">就活の軸:</label>
            <textarea id="core_values" name="core_values" rows="4" required></textarea>
            <label for="self_pr">自己PR:</label>
            <textarea id="self_pr" name="self_pr" rows="10" required></textarea>
            <input type="submit" value="作成">
        </form>
        <form action="{{ route('showProfile') }}"method="GET">
            <button type="submit">キャンセル</button>
        </form>
    </div>
    <script>
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
