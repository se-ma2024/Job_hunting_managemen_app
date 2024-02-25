<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $company->name }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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
            background-color: #f9f9f9;
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

        .float-button-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1001;
        }

        .float-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            background-color: #00C000;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-bottom: 10px;
            display: block;
        }

        .float-button:hover {
            background-color: #0056b3;
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
    <main>
        <div class="container">
            <h1>{{ $company->name }}</h1>
            <div>
                <h2>企業情報</h2>
                <h3>業種</h3>
                <p>{{ $company->industry }}</p>
                <h3>企業規模</h3>
                <p>{{ $company->company_size }}</p>
                <h3>企業の強み</h3>
                <p>{{ $company->strengths }}</p>
                <h3>福利厚生</h3>
                <p>{{ $company->benefits_package }}</p>
            </div>
            <div>
                <h2>選考情報</h2>
                <h3>選考状況</h3>
                <p>{{ $company->selection_status }}</p>
                <h3>志望動機</h3>
                <p>{{ $company->reason_for_applying }}</p>
                <h3>メモ</h3>
                <p>{{ $company->memo }}</p>
            </div>
        </div>
    </main>


    <div class="float-button-container">
        <form action="{{ route('editCompany', ['id' => $company->id]) }}" method="GET">
            <button class="float-button" type="submit">編集</button>
        </form>
        <form id="delete-form" action="{{ route('delete', ['id' => $company->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="float-button" type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
        </form>
        <form action="{{ route('index') }}" method="GET">
            <button class="float-button" type="submit">戻る</button>
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
