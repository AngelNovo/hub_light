<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    @if (!empty($resposta->correcte))
        <p style='color: green;'>El recurs s'ha creat correctament</p>
    @endif

    <form action="/tipus_usuari" method="POST">
        @csrf
        <input type="text" name="tipus" />
        <button type="submit">Envia</button>
    </form>

</body>
</html>
