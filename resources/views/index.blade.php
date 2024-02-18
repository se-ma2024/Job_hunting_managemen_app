<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>就活管理アプリ</title>
    <link rel="stylesheet" href="{{ asset('/css/companies_list.blade.css') }}">
    <style>
        /* 追加したCSS */
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

        /* 追加したCSS */
        .float-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 24px;
            text-align: center;
            line-height: 50px;
            cursor: pointer;
            z-index: 1002;
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
        <h1>企業リスト</h1>
    </header>
    <main>
        <ul>
            @foreach($companies as $company)
                <li>
                    <a href="{{ route('detailCompany', ['id' => $company->id]) }}">{{ $company->name }}</a>
                    <form id="delete-form-{{ $company->id }}" action="{{ route('delete', ['id' => $company->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirmDelete('delete-form-{{ $company->id }}')">削除</button>
                    </form>
                </li>
            @endforeach
        </ul>
        <!-- 以下が追加されたフローターボタンです -->
        <a href="{{ route('createCompany') }}" class="float-button">＋</a>
    </main>

    <script>
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
