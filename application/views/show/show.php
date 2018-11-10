<p>Новости</p>

<?php foreach ($show as $val): ?>

    <h3><?php echo $val['title']; ?></h3>
    <p><?php echo $val['description']; ?></p>
    <hr>
<?php endforeach; ?>