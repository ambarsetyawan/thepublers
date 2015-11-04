<div class="wrapper">
    {!! Form::open(['user' => 'signup', 'method' => 'post', 'files'=> true]) !!}
    {!! Form::label('user_firstname', 'Имя:') !!}<br>
    {!! Form::text('user_firstname') !!}<br>
    {{ $errors->first('user_firstname') }}<br>

    {!! Form::label('user_lastname', 'Фамилия:') !!}<br>
    {!! Form::text('user_lastname') !!}<br>
    {{ $errors->first('user_lastname') }}<br>

    {!! Form::label('user_email', 'Email:') !!}<br>
    {!! Form::email('user_email') !!}<br>
    {{ $errors->first('user_email') }}<br>

    {!! Form::label('user_password', 'Пароль:') !!}<br>
    {!! Form::password('user_password') !!}<br>
    {{ $errors->first('user_password') }}<br>

    {!! Form::label('user_cover_address', 'Обложка:') !!}<br>
    {!! Form::file('user_cover_address') !!}<br>
    {{ $errors->first('user_cover_address') }}<br>

    {!! Form::submit('Go') !!}<br>
    {!! Form::close() !!}
</div>