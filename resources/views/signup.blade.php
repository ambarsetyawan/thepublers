@section('title', 'Регистрация')
<title>@yield('title')</title>

<div class="wrapper">

{!! Form::open(array('url' => 'signup')) !!}

    {!!  Form::text('user_firstname') !!}
    {!!  Form::text('user_lastname') !!}
    {!!  Form::email('user_email') !!}
    {!!  Form::password('user_password') !!}
    {!!  Form::file('user_cover_address') !!}
    {!! Form::submit('Click me') !!}

{!! Form::close() !!}

</div>