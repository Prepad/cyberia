@include('includes.header')
<body>
@include('includes.nav')
<div class="container">
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Имя</th>
            <th scope="col">Количество книг</th>
        </tr>
        </thead>
        <tbody>
        @foreach($authors as $author)
            <tr>
                <td>{{$author->name}}</td>
                <td>{{$author->books->count()}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if($authors->lastPage() != 1)
    <nav aria-label="...">
        <ul class="pagination pagination-sm">
            <li class="page-item @if($authors->currentpage() == 1) disabled @endif">
                <a class="page-link" href="{{$authors->previousPageUrl()}}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @for ($i = 1; $i <= $authors->lastPage(); $i++)
                <li class="page-item @if ($authors->currentPage() == $i) disabled @endif">
                    <a class="page-link" href="{{$authors->resolveCurrentPath()}}?page={{$i}}" @if ($authors->currentPage() == $i) tabindex="-1" @endif>{{$i}}</a>
                </li>
            @endfor
            <li class="page-item @if($authors->currentpage() == $authors->lastPage()) disabled @endif">
                <a class="page-link" href="{{$authors->nextPageUrl()}}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
    @endif
</div>
</body>
</html>
