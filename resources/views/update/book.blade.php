@include('includes.header')
<body>
@include('includes.nav')
<div class="container">
    <form action="{{route('bookUpdate')}}" method="POST">
        @csrf
        <input type="text" hidden value="{{ $book->id }}" name="bookId">
        <div class="form-group">
            <label for="bookInputName">Введите название</label>
            <input type="text" name="bookName" class="form-control" id="bookInputName" placeholder="Введите название" value="{{ old('bookName') ? old('bookName') : $book->name }}">
            @if ($errors->has('bookName'))
                <div class="error">{{ $errors->first('bookName') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="bookInputType">Выберите тип издания</label>
            <select class="form-control" id="bookInputType" name="bookType">
                @foreach(array_column(\App\Enums\BookTypeEnum::cases(), 'value') as $type)
                    <option {{ old('bookType') ? (old('bookType') == $type ? 'selected' : '') : ($book->type == $type ? 'selected' : '')}}>{{$type}}</option>
                @endforeach
            </select>
            @if ($errors->has('bookType'))
                <div class="error">{{ $errors->first('bookType') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="bookInputAuthor">Выберите автора</label>
            <select class="form-control" id="bookInputAuthor" name="bookAuthor">
                @foreach(\App\Models\Author::all() as $author)
                    <option
                        value="{{$author->id}}"
                        {{ old('bookAuthor') ?
                            (old('bookAuthor') == $author->id ? 'selected' : '') :
                            ($book->author->id == $author->id ? 'selected' : '')
                        }}
                    >{{$author->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('bookAuthor'))
                <div class="error">{{ $errors->first('bookAuthor') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="bookInputGenre">Выберите жанры</label>
            <select class="form-control" multiple id="bookInputGenre" name="bookGenre">
                @foreach(\App\Models\Genre::all() as $genre)
                    <option
                        value="{{$genre->id}}"
                        {{ old('bookGenre') ?
                            ($genre->id == old('bookGenre') ? 'selected' : '') :
                            (in_array($genre->id, $book->genres()->get()->pluck('id')->toArray()) ? 'selected' : '')
                        }}>{{$genre->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('bookGenre'))
                <div class="error">{{ $errors->first('bookGenre') }}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
</div>
</body>
</html>
