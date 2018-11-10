
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

