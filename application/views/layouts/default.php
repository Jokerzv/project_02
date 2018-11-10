<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<script src="/public/scripts/jquery.js"></script>
	<script src="/public/scripts/form.js"></script>

    <link rel="stylesheet" href="/public/styles/main.css" type="text/css">
    <link rel="stylesheet" href="/public/styles/slider.css" type="text/css">
</head>
<body>
<header><a href="/news-settings/">Настройка новостей</a> | <a href="/slider-settings/">Настройка слайдера</a></header>
	<?php echo $content; ?>
</body>
</html>