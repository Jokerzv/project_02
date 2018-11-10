
<div id="container">

    <div id="slider-wrapper">
        <div class="inner-wrapper">
            <?php $i = 1; foreach ($img as $val): ?>

                <input checked type="radio" name="slide" class="control" id="Slide<?php echo $i; ?>" />
                <label for="Slide<?php echo $i; ?>" id="s<?php echo $i; ?>"></label>
                <?php $i++;?>
            <?php endforeach; ?>

            <div class="overflow-wrapper">
                <?php foreach ($img as $val): ?>
                    <a class="slide" href="<?php echo $val['link']; ?>"><img src="<?php echo $val['img']; ?>" /></a>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
<br />
<div id="news_list">

        <?php foreach ($news as $val): ?>
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
                    <p>
                        <a href="/news/id/<?php echo $val['id']; ?>">Подробнее</a><br />
                    </p>
                </div>
            </div>
        </div>

        <?php endforeach; ?>

    <br />
    <br />
    <?php foreach ($pages as $val): ?>

        <?php echo $val; ?>

    <?php endforeach; ?>
</div>
</div>