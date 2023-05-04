@include('includes.header')
<body>
@include('includes.nav')
<div class="container">
    <a class="btn btn-outline-success" href="{{route('bookCreateForm')}}" role="button">Добавить книгу</a>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Название</th>
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
                <a class="page-link" href="{{$books->previousPageUrl()}}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @for ($i = 1; $i <= $books->lastPage(); $i++)
                <li class="page-item @if ($books->currentPage() == $i) disabled @endif">
                    <a class="page-link" href="{{$books->resolveCurrentPath()}}?page={{$i}}" @if ($books->currentPage() == $i) tabindex="-1" @endif>{{$i}}</a>
                </li>
            @endfor
            <li class="page-item @if($books->currentpage() == $books->lastPage()) disabled @endif">
                <a class="page-link" href="{{$books->nextPageUrl()}}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
    @endif
</div>
</body>
</html>
