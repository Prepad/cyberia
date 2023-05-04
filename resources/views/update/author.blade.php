@include('includes.header')
<body>
@include('includes.nav')
<div class="container">
    <form action="{{route('authorUpdate')}}" method="POST">
        @csrf
        <input type="text" hidden value="{{ $author->id }}" name="authorId">
        <div class="form-group">
            <label for="bookInputName">Введите имя автора</label>
            <input type="text" name="authorName" class="form-control" id="bookInputName" placeholder="Введите имя автора" value="{{ old('authorName') ? old('authorName') : $author->name }}">
            @if ($errors->has('authorName'))
                <div class="error">{{ $errors->first('authorName') }}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
</div>
</body>
</html>