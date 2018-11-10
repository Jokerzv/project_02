<h3>Список новостей</h3><br /><br />
&nbsp;&nbsp;<a href="#add_news_now" class="page_click">Добавить новость</a>
<br /><br />
<a href="#x" class="overlay" id="add_news_now"></a>
<div class="popup">
    <div class="adload" id="add_loading">
        <form action="/news-settings" data="add_news" method="post">


                <label>Название</label><br />
                <input type="text" name="title" value="" id="clear_title" /><br />
            Добавить изображение: <input type="checkbox" id="img_add" name="add_img"><br />
            <input class="img_add" name="img" type="file"><br />
                <label>Описание</label><br />
            <textarea type="text" name="desc" value="" id="clear_desc"></textarea><br />
            <br />
            <input type="hidden" name="add_news" value="1" />
            <center><input type="submit" value="Добавить новость" id="add_news"/></center>
        </form>
        <a class="close"title="Закрыть" href="#close"></a>
    </div></div>

<div id="news_list">
    <table class="greenTable" width="100%">
        <thead>
    <tr>
        <td>Название</td>
        <td width="200px">Управление</td>
    </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="5">
                <div class="links">
                    <?php foreach ($pages as $val): ?>

                        <?php echo $val; ?>

                    <?php endforeach; ?>

                    </div>
            </td>
        </tr>
        </tfoot>
        <tbody>
<?php foreach ($news as $val): ?>
<tr id="id_news_<?php echo $val['id']; ?>">
    <td><?php echo $val['title']; ?></td>
    <td><a href="/news-settings/edit/<?php echo $val['id']; ?>"><div class="page_click">Редактировать</div></a>
        <form action="/news-settings" data="delete_news" id-news="<?php echo $val['id']; ?>" method="post">
            <input type="hidden" name="id_news" value="<?php echo $val['id']; ?>" />
            <center><input type="submit" value="удалить" id="del_news"/></center>
        </form>
        </td>
</tr>
<?php endforeach; ?>
        </tbody>
</table>

</div>
