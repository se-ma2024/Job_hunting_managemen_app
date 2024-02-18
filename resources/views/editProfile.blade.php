<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プロフィール編集</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 36px;
        }
        form {
            margin-top: 30px;
        }
        label {
            display: block;
            font-size: 20px;
            color: #444;
            margin-bottom: 10px;
        }
        input[type="text"],
        textarea {
            width: 98%;
            padding: 10px;
            font-size: 18px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 12px 24px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h1>プロフィール編集</h1>
        <form action="{{ route('updateProfile') }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">名前:</label>
            <input type="text" id="name" name="name" value="{{ $profile->name }}" required>
            <label for="school_name">学校名:</label>
            <input type="text" id="school_name" name="school_name" value="{{ $profile->school_name }}" required>
            <label for="phone_number">TEL:</label>
            <input type="text" id="phone_number" name="phone_number" value="{{ $profile->phone_number }}" required>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="{{ $profile->email }}" required>
            <label for="future_goals">将来の目標:</label>
            <textarea id="future_goals" name="future_goals" rows="4" required>{{ $profile->future_goals }}</textarea>
            <label for="core_values">就活の軸:</label>
            <textarea id="core_values" name="core_values" rows="4" required>{{ $profile->core_values }}</textarea>
            <label for="self_pr">自己PR:</label>
            <textarea id="self_pr" name="self_pr" rows="10" required>{{ $profile->self_pr }}</textarea>
            <input type="submit" value="更新">
        </form>
        <form action="{{ route('showProfile') }}"method="GET">
            <button type="submit">キャンセル</button>
        </form>
    </div>
</body>
</html>
