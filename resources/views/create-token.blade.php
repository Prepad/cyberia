<x-layout>
    {{ Auth::user()->name }}
    <form action="{{ route('create-token') }}" method="POST">
        @csrf
        <div>Название токена</div>
        <div>
        <input name="name" type="text">
        </div>
        <div>
        <button type="submit">Создать</button>
        </div>
    </form>
</x-layout>