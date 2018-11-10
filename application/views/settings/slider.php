<h3>Список слайдера</h3><br /><br />
&nbsp;&nbsp;<a href="#add_slider_now" class="page_click">Добавить изображения</a>
<br /><br />
<a href="#x" class="overlay" id="add_slider_now"></a>
<div class="popup">
    <div class="adload" id="add_loading">
        <form action="/slider-settings" data="add_slider" method="post">


                <label>Название</label><br />
                <input type="text" name="title" value="" id="clear_title" /><br />
                <label>Изображение</label><br />
            <input name="img" type="file"><br />
            <label>Ссылка</label><br />
            <input name="link" type="text" value=""><br />
            <br />
            <input type="hidden" name="add_slider" value="1" />
            <center><input type="submit" value="Добавить изображения" id="add_slider"/></center>
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
<tr id="id_img_<?php echo $val['id']; ?>">
    <td><?php echo $val['title']; ?></td>
    <td><a href="/slider-settings/editt/<?php echo $val['id']; ?>"><div class="page_click">Редактировать</div></a>
        <form action="/slider-settings" data="delete_img" id-img="<?php echo $val['id']; ?>" method="post">
            <input type="hidden" name="id_img" value="<?php echo $val['id']; ?>" />
            <center><input type="submit" value="удалить" id="del_news"/></center>
        </form>
        </td>
</tr>
<?php endforeach; ?>
        </tbody>
</table>

</div>
