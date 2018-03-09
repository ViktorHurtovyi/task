
<!doctype html>
<html>
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="css/main.css">

    <title>task</title>
</head>
<script src="js/jquery-3.3.1.min.js"></script>
<body>
@yield('js')
@yield('content')
<a href="{{ route('logout') }}">Выйти</a>
</body>
</html>