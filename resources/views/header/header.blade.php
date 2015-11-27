<div class="errors">
    <ul class="cols">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
<div class="header">
    <ul class="cols">
        @if(Auth::check())
            <li><a href="{{'/'}}">Главная</a></li>
            <li><a href="{{'/book'}}">Новая книга</a></li>
            <li><a href="{{ '/user/' . Auth::user()->user_id }}">Профиль</a></li>
            <li><a href="{{ '/logout' }}">Выход</a></li>
        @else
            <li><a href="{{'/'}}">Главная</a></li>
            <li><a href="{{'/login'}}">Вход</a></li>
            <li><a href="{{'/user'}}">Регистрация</a></li>
        @endif
    </ul>
</div>