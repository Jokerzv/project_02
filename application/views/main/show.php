<br />
<br />

<?php foreach ($show as $val): ?>
    <div class="blocks">
    <div class="bubble">
        <div class="rectangle"><h2><a href="/news/<?php echo $val['id']; ?>"><?php echo $val['title']; ?></a></h2></div>
        <div class="triangle-l"></div>
        <div class="triangle-r"></div>
        <div class="info">
            <?php if(!empty($val['img'])){echo "<img style='width: 200px;' src=".$val['img']." />";}?>
            <p>
                <?php echo $val['description']; ?>
            </p>
          
        </div>
    </div>

<?php endforeach; ?>