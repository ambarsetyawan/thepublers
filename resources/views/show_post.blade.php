@foreach($post as $content)
    <h3>{{ $content->post_title  }}</h3>
    <img src="/{{ $content->post_cover  }}" alt="{{ $content->post_title  }}"><br>
    {{ $content->post_category  }}<br>
    {{ $content->post_preview  }}<br>
    {{ $content->post_text  }}<br>
@endforeach