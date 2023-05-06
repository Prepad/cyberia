<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Тестовое</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('home')}}">Главная</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('tokens')}}">Токены</a>
            </li>
            @role('admin')
            <li class="nav-item">
                <a class="nav-link" href="{{route('booksList')}}">Список книг</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('authorsList')}}">Список авторов</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('genresList') }}">Список жанров</a>
            </li>
            @endrole
        </ul>
    </div>
</nav>