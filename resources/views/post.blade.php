<div class="wrapper">
    <form enctype="multipart/form-data" method="GET" action="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <ul class="cols block">
            <li>
                <label for="news_title">Название статьи
                    <input type="text" name="news_title" maxlength="64">
                </label>
            </li>
            <li>
                <label for="news_preview">Анонс
                    <input type="text" name="news_preview" maxlength="64">
                </label>
            </li>
            <li>
                <label for="news_content">Информация
                    <input type="text" name="news_content" maxlength="64">
                </label>
            </li>
            <li>
                <input type="submit" value="Опубликовать статью">
            </li>
        </ul>
    </form>
</div>