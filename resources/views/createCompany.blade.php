<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>企業追加</title>
    <link rel="stylesheet" href="{{ asset('../resources/css/createCompany.css') }}">
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
