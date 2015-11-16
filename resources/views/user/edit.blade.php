<ul class="cols">
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

<div class="wrapper">
    {!! Form::model($edit_user, ['method' => 'PATCH', 'route' => ['user.update', $edit_user->user_id], 'files' => true]) !!}

    <label for="user_cover_address">Обложка:<br>
        <input type="file" name="user_cover_address" value="{{ $edit_user->user_cover_address }}">
    </label><br>

    <label for="user_firstname">Имя:<br>
        <input type="text" name="user_firstname" value="{{ $edit_user->user_firstname }}">
    </label><br>

    <label for="user_lastname">Фамилия:<br>
        <input type="text" name="user_lastname" value="{{ $edit_user->user_lastname }}">
    </label><br>

    <label for="user_password">Пароль:<br>
        <input type="text" name="user_password">
    </label><br>

    <label for="user_email">Email:<br>
        <input type="text" name="user_email" disabled value="{{ $edit_user->user_email }}">
    </label><br>

    <label for="user_icq">ICQ:<br>
        @if($edit_user->user_icq != 0)
            <input type="text" name="user_icq" value="{{ $edit_user->user_icq }}">
        @else
            <input type="text" name="user_icq">
        @endif
    </label><br>

    <label for="user_skype">Skype:<br>
        @if(!is_null($edit_user->user_skype))
            <input type="text" name="user_skype" value="{{ $edit_user->user_skype }}">
        @else
            <input type="text" name="user_skype">
        @endif
    </label><br>

    <label for="user_about">О себе:<br>
        @if(!is_null($edit_user->user_about))
            <textarea name="user_about" id="" cols="30" rows="10">{{ $edit_user->user_about }}</textarea>
        @else
            <textarea name="user_about" id="" cols="30" rows="10"></textarea>
        @endif
    </label><br>

    <input type="submit" value="Сохранить">
    {!! Form::close() !!}

</div>