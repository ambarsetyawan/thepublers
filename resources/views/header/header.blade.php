<div class="logo">
    <ul class="cols">
        <li>
            <span class='st_facebook_hcount' displayText='Facebook'></span>
            <span class='st_vkontakte_hcount' displayText='Vkontakte'></span>
        </li>
        <li><a href="/"><img src="{{ asset('img/logo.png') }}" alt=""></a></li>
        <li>
            <div class="search">
                <form action="{{ '/search' }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <ul class="cols">
                        <li>
                            <label for="search">
                                <input type="search" name="search" placeholder="Поиск по книгам">
                            </label>
                        </li>
                    </ul>
                </form>
            </div>
        </li>
    </ul>
</div>
<div class="header">
    <ul class="cols">
        @if(Auth::check() && Entrust::hasRole('admin'))
            <li><a href="{{'/'}}">Главная</a></li>
            <li><a href="{{'/book'}}">Новая книга</a></li>
            <li><a href="{{ '/book/all' }}">Книги</a></li>
            <li><a href="{{ '/quote/all' }}">Цитаты</a></li>
            <li><a href="{{ '/category/all' }}">Категории</a></li>
            <li><a href="{{ '/user/' . Auth::user()->user_id }}">Профиль</a></li>
            <li><a href="{{ '/logout' }}">Выход</a></li>

        @elseif(Auth::check())
            <li><a href="{{'/'}}">Главная</a></li>
            <li><a href="{{'/book'}}">Новая книга</a></li>
            <a href="{{ '/book/all' }}">Книги</a>
            <li><a href="{{ '/user/' . Auth::user()->user_id }}">Профиль</a></li>
            <li><a href="{{ '/logout' }}">Выход</a></li>

        @else
            <li><a href="{{'/'}}">Главная</a></li>
            <li><a href="{{'/login'}}">Вход</a></li>
            <li><a href="{{'/user'}}">Регистрация</a></li>
        @endif
    </ul>
</div>
<div class="errors">
    <ul class="cols">
        @foreach($errors->all() as $error)
            <li><span>{{ $error }}</span></li>
        @endforeach
    </ul>
</div>