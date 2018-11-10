<h3>Редактирование новости</h3>
<br />

<div id="news_list">

<?php foreach ($edit as $val): ?>
    <form action="/news-settings/edit/<?php echo $val['id']; ?>" data="edit_news" method="post">


        <label>Название</label><br />
        <input type="text" name="title" value="<?php echo $val['title']; ?>" id="clear_title" /><br />
        Обновить изображение: <input type="checkbox" id="img_add" name="add_img"><br />
        <input class="img_add" name="img" type="file"><br />
        <input type="hidden" name="del_img_now" value="<?php echo $val['img']; ?>"/>
        <label>Описание</label><br />
        <textarea type="text" name="desc" value="<?php echo $val['description']; ?>" id="clear_desc"><?php echo $val['description']; ?></textarea><br />
        <br />
        <input type="hidden" name="edit_news" value="1" />
        <center><input type="submit" value="Сохранить новость" id="edit_news"/></center>
    </form>

<?php endforeach; ?>

</div>
