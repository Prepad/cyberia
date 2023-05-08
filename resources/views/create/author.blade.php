<x-layout>
    <div class="container">
        <form action="{{route('authorCreate')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="bookInputName">Введите имя автора</label>
                <input type="text" name="authorName" class="form-control" id="bookInputName" placeholder="Введите имя автора" value="{{ old('authorName') }}">
                @if ($errors->has('authorName'))
                    <div class="error">{{ $errors->first('authorName') }}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
</x-layout>
