<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $job->company_name }}</title>
</head>
<body>
    <h1>{{ $job->company_name }}</h1>
    <p>{{ $job->job_description }}</p>
    <a href="{{ route('jobs.edit', $job->id) }}">編集</a>
</body>
</html>
