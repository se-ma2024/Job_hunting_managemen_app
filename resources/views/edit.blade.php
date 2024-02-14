<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $company->name }} - 編集画面</title>
</head>
<body>
    <header>    
        <h1>企業詳細</h1>
    </header>
    <main>
        <form action="{{ route('update', ['id' => $company->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">企業名:</label>
            <input type="text" id="name" name="name" value="{{ $company->name }}">
            <button type="submit">更新</button>
        </form>
        <a href="{{ route('detail', ['id' => $company->id]) }}">キャンセル</a>
    </main>
</body>
</html>
