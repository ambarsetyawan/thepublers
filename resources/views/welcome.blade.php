<a href="{{ asset('book') }}">Новая книга</a>
<br><br>

@foreach($book as $content)
    <a href="/book/{{ $content->book_id }}"><img src="/{{ $content->book_cover }}" alt="{{ $content->book_title }}" title="{{ $content->book_title }}"></a>
@endforeach