<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Correo</title>
</head>
<body>
    <h2>{{$details['title']}}</h2>
    <a href="{{'laravel.test/verifica/'.$details['id']}}" target="_blank">{{$details['body']}}</a>
</body>
</html>
