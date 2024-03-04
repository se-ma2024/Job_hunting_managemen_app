<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $company->name }}</title>
    <link rel="stylesheet" href="{{ asset('../resources/css/detailCompany.css') }}">
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
