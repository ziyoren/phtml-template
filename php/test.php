<?php
$autoloader = dirname(__DIR__) . '/vendor/autoload.php';
// echo $autoloader; exit();
require_once $autoloader;


// print_r($argv);
// echo PHP_EOL;
// print_r( json_decode($argv[1], true));

// $a = Arguments::init();
// print_r($a);

use Ziyoren\HtmlTemplate\ziyo;

echo ziyo::title();