<x-layout>
<div class="container">
    <a class="btn btn-outline-success" href="{{route('authorCreateForm')}}" role="button">Добавить автора</a>
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
                <td><a href="{{ route('authorDetail', ['id' => $author->id]) }}">{{$author->name}}</a></td>
                <td>{{$author->books->count()}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="First group">
                        <a class="btn btn-outline-warning" href="{{ route('authorUpdateForm', ['id' => $author->id]) }}" role="button">Изменить</a>
                        <a class="btn btn-outline-danger" href="{{ route('authorDelete', ['id' => $author->id]) }}" role="button">Удалить</a>
                    </div>
                </td>
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
</x-layout>
