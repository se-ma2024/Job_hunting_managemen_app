<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プロフィール</title>
    <link rel="stylesheet" href="{{ asset('../resources/css/profile.css') }}">
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
