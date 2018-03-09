
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="css/main.css">

    <title>task</title>
</head>
<form method="post">
    {!! csrf_field() !!}
    Пароль: <input name="password" type="text">
    <button type="submit">Войти</button>
</form>
<body>
</body>
</html>