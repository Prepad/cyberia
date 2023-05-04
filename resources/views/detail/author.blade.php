@include('includes.header')
<body>
@include('includes.nav')
<div class="container">
    <ul class="list-group">
        <li class="list-group-item">Имя автора - {{ $author->name }}</li>
        <li class="list-group-item">Дата создания - {{ $author->created_at }}</li>
    </ul>
</div>
</body>
</html>
