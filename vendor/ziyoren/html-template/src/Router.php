<?php

namespace Ziyoren\HtmlTemplate;

use RuntimeException;

class Router 
{
    protected static $route;
    protected static $queryField = '_r';

    public static function init()
    {
        global $argv;
        if (empty($argv)){
            $queryField = self::$queryField;
            $name = $_GET[$queryField] ?? null;    
        }else{
            $name = $argv[1] ?? null;
        }
        // echo $name, __FILE__, __LINE__, PHP_EOL;
        if (empty($name)) {
            $route = Pages::default();
            // print_r([__FILE__, __LINE__,$route]);
        }else{
            $route = self::getPageByName($name);
            // print_r([__FILE__, __LINE__,$route]);
        }
        if (empty($route)){
            $route = Pages::notFound();
        }
        self::$route = $route;
    }

    public static function getPageByName($name)
    {
        return Pages::getByName($name);
    }

    public static function route()
    {
        return self::$route;
    }

    public static function name()
    {
        $name = self::$route['name'] ?? null;
        if (!$name){
            throw new RuntimeException('未知的name');
        }
        return $name;
    }

    public static function title($default='undefined')
    {
        return self::$route['title'] ?? $default;
    }

    public static function component()
    {
        $component = self::$route['component'] ?? null;
        if (!$component){
            throw new RuntimeException('页面组件未配置');
        }
        return $component;
    }

    public static function link(String $name, $text = '', $options=[])
    {
        if (php_sapi_name() == 'cli'){
            $href = $name . '.html';
        }else{
            $queryField = self::$queryField;
            $href = '/?' . http_build_query([$queryField => $name]);
        }
        $hash = self::hash($options);
        $href .= $hash;
        $target = self::target($options);
        if (empty($text)){
            $page = self::getPageByName($name);
            $text = $page['title'] ?? '未知页面';
        }
        echo '<a href="'. $href .'"'. $target .'>'. $text . '</a>';
    }

    protected static function hash($options = [])
    {
        $hash = $options['hash'] ?? null;
        return $hash ? '#'. $hash : '';
    }

    protected static function target($options = [])
    {
        $target = $options['target'] ?? null;
        return $target ? ' target="'. $target .'"' : '';
    }

    public static function exteralLink($url, $text, $options=[])
    {
        echo '<a href="'. $url .'" target="_blank">'. $text .'</a>';
    }

    public static function className($prefix)
    {
        echo $prefix . '__' . self::name();
    }

}