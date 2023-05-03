@include('includes.header')
<body>
@include('includes.nav')
<div class="container">
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Название жанра</th>
        </tr>
        </thead>
        <tbody>
        @foreach($genres as $genre)
            <tr>
                <td>{{$genre->name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if($genres->lastPage() != 1)
        <nav aria-label="...">
            <ul class="pagination pagination-sm">
                <li class="page-item @if($genres->currentpage() == 1) disabled @endif">
                    <a class="page-link" href="{{$genres->previousPageUrl()}}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                @for ($i = 1; $i <= $genres->lastPage(); $i++)
                    <li class="page-item @if ($genres->currentPage() == $i) disabled @endif">
                        <a class="page-link" href="{{$genres->resolveCurrentPath()}}?page={{$i}}" @if ($genres->currentPage() == $i) tabindex="-1" @endif>{{$i}}</a>
                    </li>
                @endfor
                <li class="page-item @if($genres->currentpage() == $genres->lastPage()) disabled @endif">
                    <a class="page-link" href="{{$genres->nextPageUrl()}}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    @endif
</div>
</body>
</html>
