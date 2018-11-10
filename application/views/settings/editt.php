<h3>Редактирование</h3>
<br />

<div id="news_list">

    <?php foreach ($edit as $val): ?>
        <form action="/slider-settings/editt/<?php echo $val['id']; ?>" data="edit_slider" method="post">


            <label>Название</label><br />
            <input type="text" name="title" value="<?php echo $val['title']; ?>" id="clear_title" /><br />
            Обновить изображение: <input type="checkbox" id="img_add" name="add_img"><br />
            <input class="img_add" name="img" type="file"><br />
            <input type="hidden" name="del_img_now" value="<?php echo $val['img']; ?>"/>
            <label>Ссылка</label><br />
            <input type="text" name="link" value="<?php echo $val['link']; ?>" id="clear_title" /><br />
            <br />
            <input type="hidden" name="edit_slider" value="1" />
            <center><input type="submit" value="Сохранить" id="edit_news"/></center>
        </form>

    <?php endforeach; ?>

</div>
