<div class="wrapper">
    <form enctype="multipart/form-data" method="GET" action="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <ul class="cols block">
            <li>
                <label for="news_cover">Название статьи<br>
                    <input type="file" name="news_cover">
                </label>
            </li>
            <li>
                <label for="news_title">Название статьи<br>
                    <input type="text" name="news_title" maxlength="64">
                </label>
            </li>
            <li>
                <label for="news_preview">Анонс<br>
                    <textarea name="news_preview" id="" cols="30" rows="10" maxlength="128"></textarea>
                </label>
            </li>
            <li>
                <label for="news_content">Информация<br>
                    <textarea name="news_content" id="" cols="30" rows="10"></textarea>
                </label>
            </li>
            <li>
                <input type="submit" value="Опубликовать статью">
            </li>
        </ul>
    </form>
</div>