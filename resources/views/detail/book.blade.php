@include('includes.header')
<body>
@include('includes.nav')
<div class="container">
    <ul class="list-group">
        <li class="list-group-item">Название - {{ $book->name }}</li>
        <li class="list-group-item">Жанры - {{ implode(', ', array_column($book->genres->toArray(), 'name')) }}</li>
        <li class="list-group-item">Автор - {{ $book->author->name }}</li>
        <li class="list-group-item">Тип издания - {{ $book->type }}</li>
        <li class="list-group-item">Дата создания - {{ $book->created_at }}</li>
    </ul>
</div>
</body>
</html>
