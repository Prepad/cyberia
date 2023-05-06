<x-layout>
    {{ Auth::user()->name }}
    <a href="{{ route('create-token-view') }}">Создать токен</a>
    @foreach($tokens as $token)
        <div>{{ $token->name }}: {{ $token->token }}</div>
    @endforeach
</x-layout>