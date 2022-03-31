<?php
require_once __DIR__ . '/autoload.php';

use Ziyoren\HtmlTemplate\ziyo;
?>
<ul class="nav-menu-box">
    <li class="animation-timing"><?php ziyo::link('index') ?></li>
    <li>
        <div class="dropdown">
            <?php ziyo::link('about') ?>
            <div class="dropdown-content">
                <ul class="nav-sub-menu">
                    <li><?php ziyo::link('about', '公司介绍', ['hash'=>'aboutus']) ?></li>
                    <li><?php ziyo::link('about', '企业文化', ['hash'=>'corporate-culture']) ?></li>
                    <li><?php ziyo::link('about', '组织架构', ['hash'=>'structure']) ?></li>
                    <li><?php ziyo::link('about', '资质荣誉', ['hash'=>'honor']) ?></li>
                </ul>
            </div>
        </div>
    </li>
    <li>
        <div class="dropdown">
            <?php ziyo::link('classic-case') ?>
            <div class="dropdown-content">
                <ul class="nav-sub-menu">
                    <li><?php ziyo::link('classic-case', '经典案例1', ['hash'=>'anli1']) ?></li>
                    <li><?php ziyo::link('classic-case', '经典案例2', ['hash'=>'anli2']) ?></li>
                    <li><?php ziyo::link('classic-case', '经典案例3', ['hash'=>'anli3']) ?></li>
                    <li><?php ziyo::link('classic-case', '经典案例4', ['hash'=>'anli4']) ?></li>
                </ul>
            </div>
        </div>
    </li>
    <li><?php ziyo::link('core-technology') ?></li>
    <li><?php ziyo::link('news') ?></li>
    <li><?php ziyo::link('human-resources') ?></li>
    <li><?php ziyo::link('contact-us') ?></li>
</ul>