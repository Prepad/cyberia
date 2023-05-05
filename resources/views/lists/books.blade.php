@include('includes.header')
<body>
@include('includes.nav')
<div class="container">
    <div class="d-inline-flex">
        <a class="btn btn-outline-success" href="{{route('bookCreateForm')}}" role="button">Добавить книгу</a>
        <form class="form-inline" action="{{ route('booksList') }}" method="GET">
            <div class="input-group">
                <input
                    class="form-control mr-sm-2"
                    type="search"
                    placeholder="Название книги"
                    name="search"
                    value="{{ request()->input('search') ? request()->input('search') : ''}}"
                >
                <div class="input-group-append">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
                </div>
            </div>
        </form>
        <form class="form-inline" action="{{ route('booksList') }}" method="GET">
            <div class="input-group">
                <select class="form-control mr-sm-2" name="author">
                    @foreach(\App\Models\Author::all() as $author)
                        <option value="{{$author->id}}" @if($author->id == request()->get('author')) {{ 'selected' }} @endif>{{$author->name}}</option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Фильтр</button>
                </div>
            </div>
        </form>
        <form class="form-inline" action="{{ route('booksList') }}" method="GET">
            <div class="input-group">
                <select class="form-control mr-sm-2" name="genre">
                    @foreach(\App\Models\Genre::all() as $genre)
                        <option value="{{$genre->id}}" @if($genre->id == request()->get('genre')) {{ 'selected' }} @endif>{{$genre->name}}</option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Фильтр</button>
                </div>
            </div>
        </form>
    </div>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col"><a href="{{route('booksList', ['sort' => request()->get('sort') == 'asc' ? 'desc' : 'asc'])}}">Название</a> @if(request()->has('sort')) @if(request()->get('sort') == 'desc'){{'↓'}}@else{{'↑'}}@endif @endif </th>
            <th scope="col">Автор</th>
            <th scope="col">Жанры</th>
            <th scope="col">Дата создания</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <td><a href="{{ route('bookDetail', ['id' => $book->id]) }}">{{$book->name}}</a></td>
                <td>{{$book->author->name}}</td>
                <td>{{implode(',',array_column($book->genres->toArray(), 'name'))}}</td>
                <td>{{$book->created_at}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="First group">
                        <a class="btn btn-outline-warning" href="{{ route('bookUpdateForm', ['id' => $book->id]) }}" role="button">Изменить</a>
                        <a class="btn btn-outline-danger" href="{{ route('bookDelete', ['id' => $book->id]) }}" role="button">Удалить</a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if($books->lastPage() != 1)
    <nav aria-label="...">
        <ul class="pagination pagination-sm">
            <li class="page-item @if($books->currentpage() == 1) disabled @endif">
                <a
                    class="page-link"
                    href="{{$books->previousPageUrl()}}{{request()->has('search') ? '&search=' . request()->get('search') : ''}}"
                    aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @for ($i = 1; $i <= $books->lastPage(); $i++)
                <li class="page-item @if ($books->currentPage() == $i) disabled @endif">
                    <a
                        class="page-link"
                        href="{{$books->resolveCurrentPath()}}?page={{$i}}{{ request()->has('search') ? '&search=' . request()->get('search') : ''}}"
                        @if ($books->currentPage() == $i) tabindex="-1" @endif
                    >{{$i}}</a>
                </li>
            @endfor
            <li class="page-item @if($books->currentpage() == $books->lastPage()) disabled @endif">
                <a
                    class="page-link"
                    href="{{$books->nextPageUrl()}}{{request()->has('search') ? '&search=' . request()->get('search') : ''}}"
                    aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
    @endif
</div>
</body>
</html>
