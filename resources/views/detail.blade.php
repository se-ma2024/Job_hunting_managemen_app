<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $company->name }}</title>
</head>
<body>
    <header>
        <h1>企業詳細</h1>
    </header>
    <main>
        <div>
            <h2>{{ $company->name }}</h2>
            <p>企業ID: {{ $company->id }}</p>
            <!-- その他の企業の詳細情報を表示する場合はここに追加 -->
        </div>
        <a href="{{ route('edit', ['id' => $company->id]) }}">編集</a>
        <a href="{{ route('index') }}">戻る</a>
    </main>
</body>
</html>
