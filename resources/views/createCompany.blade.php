<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>企業追加</title>
    <link rel="stylesheet" href="{{ asset('/css/create_company.blade.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
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

        label {
            color: #444;
            font-size: 20px;
            margin-top: 20px;
        }

        input[type="text"],
        textarea,
        select {
            width: calc(100%);
            padding: 10px;
            box-sizing: border-box;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
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
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1001;
        }

        .float-button:hover {
            background-color: #0056b3;
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
            <h1>企業追加</h1>
            <form method="POST" action="{{ route('addCompanyDetail') }}">
                @csrf
                <div>
                    <label for="name">企業名</label>
                    <input type="text" id="name" name="name">
                </div>
                <div>
                    <label for="industry">業界</label>
                    <select id="industry" name="industry">
                        <option value="メーカー">メーカー</option>
                        <option value="商社">商社</option>
                        <option value="流通・小売">流通・小売</option>
                        <option value="金融">金融</option>
                        <option value="サービス・インフラ">サービス・インフラ</option>
                        <option value="ソフトウエア・通信">ソフトウエア・通信</option>
                        <option value="広告・出版・マスコミ">広告・出版・マスコミ</option>
                        <option value="官公庁・公社・団体">官公庁・公社・団体</option>
                    </select>
                </div>
                <div>
                    <label for="company_size">企業規模</label>
                    <select id="company_size" name="company_size">
                        <option value="大企業">大企業</option>
                        <option value="大手企業">大手企業</option>
                        <option value="グローバル企業">グローバル企業</option>
                        <option value="中企業">中企業</option>
                        <option value="中小企業">中小企業</option>
                        <option value="中堅中小企業">中堅中小企業</option>
                        <option value="ベンチャー企業">ベンチャー企業</option>
                        <option value="スタートアップ">スタートアップ</option>
                    </select>
                </div>
                <div>
                    <label for="strengths">強み</label>
                    <textarea id="strengths" name="strengths" rows="4"></textarea>
                </div>
                <div>
                    <label for="benefits_package">福利厚生</label>
                    <textarea id="benefits_package" name="benefits_package" rows="4"></textarea>
                </div>
                <div>
                    <label for="selection_status">選考状況</label>
                    <select id="selection_status" name="selection_status">
                        <optgroup label="書類選考">
                            <option value="書類選考中">書類選考中</option>
                            <option value="書類通過">書類通過</option>
                            <option value="書類不合格">書類不合格</option>
                        </optgroup>
                        <optgroup label="面接">
                            <option value="一次面接">一次面接</option>
                            <option value="二次面接">二次面接</option>
                            <option value="最終面接">最終面接</option>
                        </optgroup>
                        <optgroup label="内定">
                            <option value="内定">内定</option>
                            <option value="内定辞退">内定辞退</option>
                        </optgroup>
                        <optgroup label="不合格">
                            <option value="不合格">不合格</option>
                        </optgroup>
                    </select>
                </div>
                <div>
                    <label for="reason_for_applying">志望動機</label>
                    <textarea id="reason_for_applying" name="reason_for_applying" rows="10"></textarea>
                </div>
                <div>
                    <label for="memo">メモ</label>
                    <textarea id="memo" name="memo" rows="10"></textarea>
                </div>
                <button type="submit">追加</button>
            </form>
        </div>
        <form action="{{ route('index') }}" method="GET">
            <button class="float-button" type="submit">戻る</button>
        </form>
    </main>
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
