<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <title>Home</title>
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href={{asset("/favicon.ico")}}>
    <link rel="stylesheet" href={{asset("/css/front/layout.css")}}>
    <link rel="stylesheet" href={{asset("/css/front/pe-icon-7-stroke.css")}}>
    <script src="{{asset("/js/front/responsive.js")}}"></script>
    <script src="{{asset("/js/front/layout.js")}}"></script>
</head>
<body>
    @include("front.layout.nav")
    @yield("content")
    @include("front.layout.modal")
    @include("front.layout.footer")
</body>
</html>
