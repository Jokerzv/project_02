<h3>Список новостей</h3>
<a href="#add_news_now">Добавить новость</a>

<a href="#x" class="overlay" id="add_news_now"></a>
<div class="popup">
    <div class="adload" id="add_loading">
        <form action="/news-settings" data="add_news" method="post">


                <label>Название</label><br />
                <input type="text" name="title" value="" /><br />
                <label>Описание</label><br />
            <textarea type="text" name="desc" value=""></textarea><br />
            <br />
            <input type="hidden" name="add_news" value="1" />
            <center><input type="submit" value="Добавить новость" id="add_news"/></center>
        </form>
        <a class="close"title="Закрыть" href="#close"></a>
    </div></div>

<div id="news_list">
<table width="100%">
    <tr>
        <td>Название</td>
        <td width="200px">Управление</td>
    </tr>
<?php foreach ($news as $val): ?>
<tr id="id_news">
    <td><?php echo $val['title']; ?></td>
    <td>Редактировать / удалить</td>
</tr>
<?php endforeach; ?>
</table>

<?php foreach ($pages as $val): ?>

    <?php echo $val; ?>

<?php endforeach; ?>
</div>
