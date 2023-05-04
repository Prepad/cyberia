@include('includes.header')
<body>
@include('includes.nav')
<div class="container">
    <form action="{{route('genreCreate')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="bookInputName">Введите название жанра</label>
            <input type="text" name="genreName" class="form-control" id="bookInputName" placeholder="Введите название жанра" value="{{ old('genreName') }}">
            @if ($errors->has('genreName'))
                <div class="error">{{ $errors->first('genreName') }}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
</div>
</body>
</html>
