<x-layout>
    {{ Auth::user()->name }}
    <div>
    <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        Выйти
    </a>
    </div>
    <div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    </div>
</x-layout>