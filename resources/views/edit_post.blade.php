<ul>
@foreach($edit_post as $edit)
    <li>{{ $edit }}</li>
@endforeach
</ul>


<div class="wrapper">
    {!! Form::open(['post' => 'post', 'method' => 'post', 'files'=> true]) !!}
    @foreach($edit_post as $edit)
    {!! Form::label('post_cover', '�������:') !!}<br>
    {!! Form::file('post_cover') !!}<br>

    {!! Form::label('post_title', '�������� ������:') !!}<br>
    {!! Form::text('post_title') !!}<br>

    {!! Form::label('post_category', '������� ���������:') !!}<br>
    {!! Form::select('post_category', ['L' => 'Large', 'S' => 'Small']) !!}<br>

    {!! Form::label('post_preview', '����� �������:') !!}<br>
    {!! Form::textarea('post_preview') !!}<br>

    {!! Form::label('post_text', '����������:') !!}<br>
    {!! Form::textarea('post_text') !!}<br>
    @endforeach
    {!! Form::submit('��������') !!}<br>
    {!! Form::close() !!}
</div>