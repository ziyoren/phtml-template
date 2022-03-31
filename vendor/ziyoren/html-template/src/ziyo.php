<?php

namespace Ziyoren\HtmlTemplate;

use RuntimeException;

class ziyo
{
    protected static $pages = [];
    protected static $argv = [];
    protected static $root = '';

    public static function run()
    {
        self::__init();
    }

    protected static function __init()
    {
        Router::init();
        Pages::init();
    }

    public static function start()
    {
        self::__init();
        $config = Pages::config();
        $page = Router::route();
        $template = $page['template'] ?? $config['template'] ?? 'template/index.php';
        self::require($template);
    }

    public static function root()
    {
        return strstr(__DIR__, '/vendor/ziyoren', true) . DIRECTORY_SEPARATOR;
    }

    public static function title($default = 'undefined')
    {
        echo Router::title($default);
    }

    public static function RouteView()
    {
        self::require(Router::component());
    }

    public static function require($path)
    {
        $file = self::root() . 'php/' . rtrim($path, '.php') . '.php';
        if (is_file($file)) {
            return require $file;
        } else {
            echo '<h1>[' . $path . ']模板文件不存在。</h1>';
        }
    }

    public static function write($component)
    {
        self::require($component);
    }

    public static function route()
    {
        return Router::route();
    }

    public static function __callStatic($name, $arguments)
    {
        switch ($name) {
            case 'className':
                Router::className(...$arguments);
                break;
            case 'pageName':
                echo Router::name();
                break;
            case 'link':
                echo Router::link(...$arguments);
                break;
        }
    }
}
