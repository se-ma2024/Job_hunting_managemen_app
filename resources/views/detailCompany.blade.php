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
            <p>業種: {{ $company->industry }}</p>
            <p>企業規模: {{ $company->company_size }}</p>
            <p>企業の強み: {{ $company->strengths }}</p>
            <p>福利厚生: {{ $company->benefits_package }}</p>
            <p>選考状況: {{ $company->selection_status }}</p>
            <p>志望動機: {{ $company->reason_for_applying }}</p>
            <p>メモ: {{ $company->memo }}</p>
        </div>
        <form action="{{ route('editCompany', ['id' => $company->id]) }}" method="GET">
            <button type="submit">編集</button>
        </form>
        <form action="{{ route('index') }}", method="GET">
            <button type="submit">戻る</button>
        </form>
    </main>
</body>
</html>
