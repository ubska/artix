<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Benvenuto</title>
</head>

<body>
    <h1>Benvenuto nel tuo gestionale!</h1>
    <a href="{{ route('login') }}">Login</a> |
    <a href="{{ route('register') }}">Registrati</a>
</body>

</html>
