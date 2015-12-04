<link rel="stylesheet" href="{{ asset("css/css.css") }}">

<div class="wrapper">

    @include('header.header')
    <h3>Редактировать пользователя</h3>
    <form action="/user/{{ $edit_user->user_id }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <label for="user_cover_address">Обложка:
            <input type="file" name="user_cover_address" value="{{ $edit_user->user_cover_address }}">
        </label>

        <label for="user_firstname">Имя:
            <input type="text" name="user_firstname" value="{{ $edit_user->user_firstname }}">
        </label>

        <label for="user_lastname">Фамилия:
            <input type="text" name="user_lastname" value="{{ $edit_user->user_lastname }}">
        </label>

        <label for="user_password">Пароль:
            <input type="password" name="user_password">
        </label>

        <label for="user_email">Email:
            <input type="email" name="user_email" disabled value="{{ $edit_user->user_email }}">
        </label>

        <label for="user_icq">ICQ:
            @if($edit_user->user_icq != 0)
                <input type="text" name="user_icq" value="{{ $edit_user->user_icq }}">
            @else
                <input type="text" name="user_icq">
            @endif
        </label>

        <label for="user_skype">Skype:
            @if(!is_null($edit_user->user_skype))
                <input type="text" name="user_skype" value="{{ $edit_user->user_skype }}">
            @else
                <input type="text" name="user_skype">
            @endif
        </label>

        <label for="user_about">О себе:
            @if(!is_null($edit_user->user_about))
                <textarea name="user_about" id="" cols="30" rows="10">{{ $edit_user->user_about }}</textarea>
            @else
                <textarea name="user_about" id="" cols="30" rows="10"></textarea>
            @endif
        </label>

        <input type="submit" value="Сохранить">
    </form>

</div>