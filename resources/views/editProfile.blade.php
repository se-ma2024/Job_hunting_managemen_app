<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プロフィール編集</title>
    <link rel="stylesheet" href="{{ asset('../resources/css/editProfile.css') }}">
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
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1>プロフィール編集</h1>
        <form action="{{ route('updateProfile') }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">名前:</label>
            <input type="text" id="name" name="name" value="{{ $profile->name }}" required>
            <label for="school_name">学校名:</label>
            <input type="text" id="school_name" name="school_name" value="{{ $profile->school_name }}" required>
            <label for="phone_number">TEL:</label>
            <input type="text" id="phone_number" name="phone_number" value="{{ $profile->phone_number }}" required>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="{{ $profile->email }}" required>
            <label for="future_goals">将来の目標:</label>
            <textarea id="future_goals" name="future_goals" rows="4" required>{{ $profile->future_goals }}</textarea>
            <label for="core_values">就活の軸:</label>
            <textarea id="core_values" name="core_values" rows="4" required>{{ $profile->core_values }}</textarea>
            <label for="self_pr">自己PR:</label>
            <textarea id="self_pr" name="self_pr" rows="10" required>{{ $profile->self_pr }}</textarea>
            <input type="submit" value="更新">
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
