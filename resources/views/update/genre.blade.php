<x-layout>
    <div class="container">
        <form action="{{route('genreUpdate')}}" method="POST">
            @csrf
            <input type="text" hidden value="{{ $genre->id }}" name="genreId">
            <div class="form-group">
                <label for="bookInputName">Введите название жанра</label>
                <input type="text" name="genreName" class="form-control" id="bookInputName" placeholder="Введите название" value="{{ old('genreName') ? old('genreName') : $genre->name }}">
                @if ($errors->has('genreName'))
                    <div class="error">{{ $errors->first('genreName') }}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
</x-layout>
