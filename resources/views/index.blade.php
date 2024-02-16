<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>就活管理アプリ</title>
    <link rel="stylesheet" href="{{ asset('/css/companies_list.blade.css') }}">
</head>
<body>
    <header>
        <h1>企業リスト</h1>
    </header>
    <main>
        <ul>
            @foreach($companies as $company)
                <li>
                    <a href="{{ route('detail', ['id' => $company->id]) }}">{{ $company->name }}</a>
                    <form id="delete-form-{{ $company->id }}" action="{{ route('delete', ['id' => $company->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirmDelete('delete-form-{{ $company->id }}')">削除</button>
                    </form>
                </li>
            @endforeach
        </ul>
        <a href="{{ route('createCompany') }}">企業追加</a>
    </main>

    <script>
        function confirmDelete(formId) {
            return confirm('本当に削除してもよろしいですか？');
        }
    </script>
</body>
</html>
