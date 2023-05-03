@include('includes.header')
<body>
@include('includes.nav')
<div class="container">
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
                <td>{{$book->name}}</td>
                <td>{{$book->author->name}}</td>
                <td>{{implode(',',array_column($book->genres->toArray(), 'name'))}}</td>
                <td>{{$book->created_at}}</td>
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
