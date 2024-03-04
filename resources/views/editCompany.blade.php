<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>企業詳細編集</title>
    <link rel="stylesheet" href="{{ asset('../resources/css/editCompany.css') }}">
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
            <h1>企業詳細編集</h1>
            <form action="{{ route('updateCompany', ['id' => $company->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <label for="name">企業名</label>
                    <input type="text" id="name" name="name" value="{{ $company->name }}">
                </div>
                <div>
                    <label for="industry">業界:</label>
                    <select id="industry" name="industry">
                        <option value="メーカー" {{ $company->industry === 'メーカー' ? 'selected' : '' }}>メーカー</option>
                        <option value="商社" {{ $company->industry === '商社' ? 'selected' : '' }}>商社</option>
                        <option value="流通・小売" {{ $company->industry === '流通・小売' ? 'selected' : '' }}>流通・小売</option>
                        <option value="金融" {{ $company->industry === '金融' ? 'selected' : '' }}>金融</option>
                        <option value="サービス・インフラ" {{ $company->industry === 'サービス・インフラ' ? 'selected' : '' }}>サービス・インフラ</option>
                        <option value="ソフトウエア・通信" {{ $company->industry === 'ソフトウエア・通信' ? 'selected' : '' }}>ソフトウエア・通信</option>
                        <option value="広告・出版・マスコミ" {{ $company->industry === '広告・出版・マスコミ' ? 'selected' : '' }}>広告・出版・マスコミ</option>
                        <option value="官公庁・公社・団体" {{ $company->industry === '官公庁・公社・団体' ? 'selected' : '' }}>官公庁・公社・団体</option>
                    </select>
                </div>
                <div>
                    <label for="company_size">企業規模:</label>
                    <select id="company_size" name="company_size">
                        <option value="大企業" {{ $company->company_size === '大企業' ? 'selected' : ''}}>大企業</option>
                        <option value="大手企業" {{ $company->company_size === '大手企業' ? 'selected' : ''}}>大手企業</option>
                        <option value="グローバル企業" {{ $company->company_size === 'グローバル企業' ? 'selected' : ''}}>グローバル企業</option>
                        <option value="中企業" {{ $company->company_size === '中企業' ? 'selected' : ''}}>中企業</option>
                        <option value="中小企業" {{ $company->company_size === '中小企業' ? 'selected' : ''}}>中小企業</option>
                        <option value="中堅中小企業" {{ $company->company_size === '中堅中小企業' ? 'selected' : ''}}>中堅中小企業</option>
                        <option value="ベンチャー企業" {{ $company->company_size === 'ベンチャー企業' ? 'selected' : ''}}>ベンチャー企業</option>
                        <option value="スタートアップ" {{ $company->company_size === 'スタートアップ' ? 'selected' : ''}}>スタートアップ</option>
                    </select>
                </div>
                <div>
                    <label for="strengths">強み:</label>
                    <textarea id="strengths" name="strengths" rows="4">{{ $company->strengths }}</textarea>
                </div>
                <div>
                    <label for="benefits_package">福利厚生:</label>
                    <textarea id="benefits_package" name="benefits_package" rows="4">{{ $company->benefits_package }}</textarea>
                </div>
                <div>
                    <label for="selection_status">選考状況:</label>
                    <select id="selection_status" name="selection_status">
                        <optgroup label="書類選考">
                            <option value="書類選考中" {{ $company->selection_status === '書類選考中' ? 'selected' : ''}}>書類選考中</option>
                            <option value="書類通過" {{ $company->selection_status === '書類通過' ? 'selected' : ''}}>書類通過</option>
                            <option value="書類不合格" {{ $company->selection_status === '書類不合格' ? 'selected' : ''}}>書類不合格</option>
                        </optgroup>
                        <optgroup label="面接">
                            <option value="一次面接" {{ $company->selection_status === '一次面接' ? 'selected' : ''}}>一次面接</option>
                            <option value="二次面接" {{ $company->selection_status === '二次面接' ? 'selected' : ''}}>二次面接</option>
                            <option value="最終面接" {{ $company->selection_status === '最終面接' ? 'selected' : ''}}>最終面接</option>
                        </optgroup>
                        <optgroup label="内定">
                            <option value="内定" {{ $company->selection_status === '内定' ? 'selected' : ''}}>内定</option>
                            <option value="内定辞退" {{ $company->selection_status === '内定辞退' ? 'selected' : ''}}>内定辞退</option>
                        </optgroup>
                        <optgroup label="不合格">
                            <option value="不合格" {{ $company->selection_status === '不合格' ? 'selected' : ''}}>不合格</option>
                        </optgroup>
                    </select>
                </div>
                <div>
                    <label for="reason_for_applying">志望動機:</label>
                    <textarea id="reason_for_applying" name="reason_for_applying" rows="10">{{ $company->reason_for_applying }}</textarea>
                </div>
                <div>
                    <label for="memo">メモ:</label>
                    <textarea id="memo" name="memo" rows="10">{{ $company->memo }}</textarea>
                </div>
                <button type="submit">更新</button>
            </form>
        </div>
        <form action="{{ route('detailCompany', ['id' => $company->id]) }}"method="GET">
            <button class="float-button" type="submit">キャンセル</button>
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
