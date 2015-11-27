<link rel="stylesheet" href="{{ asset("css/css.css") }}">

<div class="wrapper">

    @include('header.header')

    <div class="user_info">
        <ul class="cols">
            <li>
                <ul class="cols">
                    <li><img src="/{{ $get_user->user_cover_address }}"
                             alt="{{ $get_user->user_firstname }} {{ $get_user->user_lastname }}"
                             title="{{ $get_user->user_firstname }} {{ $get_user->user_lastname }}"></li>
                </ul>
            </li>
            <li>
                <ul class="cols">
                    <li>Имя:</li>
                    <li>{{ $get_user->user_firstname }}</li>
                </ul>
            </li>
            <li>
                <ul class="cols">
                    <li>Фамилия:</li>
                    <li>{{ $get_user->user_lastname }}</li>
                </ul>
            </li>
            <li>
                <ul class="cols">
                    <li>Email:</li>
                    <li>{{ $get_user->user_email }}</li>
                </ul>
            </li>
            <li>
                <ul class="cols">
                    <li>ICQ:</li>
                    <li>
                        @if($get_user->user_icq != 0)
                            {{ $get_user->user_icq }}
                        @endif
                    </li>
                </ul>
            </li>
            <li>
                <ul class="cols">
                    <li>Skype:</li>
                    <li>
                        @if(!is_null($get_user->user_skype))
                            {{ $get_user->user_skype }}
                        @endif
                    </li>
                </ul>
            </li>
            <li>
                <ul class="cols">
                    <li>О себе:</li>
                    <li>
                        @if(!is_null($get_user->user_about))
                            {{ $get_user->user_about }}
                        @endif
                    </li>
                </ul>
            </li>
            <li>
                <ul class="cols">
                    @if(Auth::check() && $get_user->book_user_id == Auth::id())
                        <li><a href="/user/{{$get_user->user_id }}/edit" class="admin_link">Редактировать</a></li>
                        <li>
                            <form action="" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" value="Удалить аккаунт">
                            </form>
                        </li>
                    @endif
                </ul>
            </li>
        </ul>
    </div>
</div>