<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>企業追加</title>
    <link rel="stylesheet" href="{{ asset('/css/create_company.blade.css')  }}" >
</head>
<body>
    <header>
        <h1>企業追加</h1>
    </header>
    <main>
        <form method="POST" action="{{ route('store') }}">
            @csrf
            <div>
                <label for="name">企業名:</label>
                <input type="text" id="name" name="name">
            </div>
            <!-- <div>
                <label for="description">説明:</label>
                <textarea id="description" name="description"></textarea>
            </div> -->
            <button type="submit">追加</button>
        </form>
    </main>
    <a href="{{ route('index') }}">戻る</a>
</body>
</html>
