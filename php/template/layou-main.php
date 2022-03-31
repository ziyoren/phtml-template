<?php
require_once dirname(__DIR__) . '/autoload.php';

use Ziyoren\HtmlTemplate\ziyo;
ziyo::run();

$title = 'Ziyo.Ren';
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php ziyo::title($title); ?> ::: 杭州智游网络科技有限公司</title>
    <link href="https://cdn.bootcdn.net/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link href="assets/css/index.css" rel="stylesheet">
</head>
<body>
    <div class="main-box">
        <?php ziyo::require('footer') ; ?>
        <div class="body-box"><?php ziyo::RouteView(); ?></div>
    </div>
</body>
</html>