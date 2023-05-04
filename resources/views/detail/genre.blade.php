@include('includes.header')
<body>
@include('includes.nav')
<div class="container">
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">Название жанра - {{ $genre->name }}</li>
            <li class="list-group-item">Дата создания - {{ $genre->created_at }}</li>
        </ul>
    </div>
</div>
</body>
</html>
