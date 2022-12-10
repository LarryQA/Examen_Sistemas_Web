<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SuperClass</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    @include('layouts.partials.navbar')

    @yield('contenido')
    
</body>
</html>