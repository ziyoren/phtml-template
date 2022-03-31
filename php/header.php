<?php
require_once __DIR__ . '/autoload.php';

use Ziyoren\HtmlTemplate\ziyo;
?>
<header class="<?php ziyo::className('header') ?>">
    <div class="navbar">
        <div class="navbar-warp">
            <div class="animate__animated animate__headShake logo">
                <img src="https://www.ziyo.ren/img/ziyo/logo.png">
            </div>
            <div class="menu-bar">
                <?php ziyo::write('menu'); ?>
            </div>
        </div>
    </div>
</header>
