<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Тестовое задание</title>
    @vite(['resources/js/app.js'])
    @vite(['resources/sass/app.scss'])

</head>

<body>
    <h1>Todos</h1>
    <hr />
    <x-nav />
    {{ $slot }}
</body>

</html>