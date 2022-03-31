<?php

namespace Ziyoren\HtmlTemplate;

use RuntimeException;

class Pages
{
    protected static $config = [];
    protected static $pages = [];

    public static function init()
    {
        self::load();
    }
   
    public static function config($key = null)
    {
        if (empty(self::$config)){
            self::load();
        }
        $config = self::$config;
        if ($key){
            return $config[$key];
        }else{
            return $config;
        }
    }


    public static function load()
    {
        if (empty(self::$pages)){
            $root = ziyo::root();
            $pages = $root . 'page.json';
            if (!is_file($pages)){
                throw new RuntimeException('缺少page.json配置文件');
            }
            $pgJson = file_get_contents($pages);
            $pgs = json_decode($pgJson, true) ?? null;
            self::$config = $pgs;
            self::$pages = $pgs ? $pgs['pages'] : [];
        }
    }

    public static function pages()
    {
        if (empty(self::$pages)){
            self::load();
        }
        return self::$pages;
    }

    public static function default()
    {
        return self::pages()[0] ?? [];
    }

    public static function getByName($name)
    {
        $pages = self::pages();
        $fv = array_filter($pages, function($item) use ($name){
            return $item['name'] == $name;
        });
        return array_values($fv)[0] ?? [];
    }

    public static function notFound(){
        $p404 = self::getByName('404');
        if (empty($p404)){
            exit( '<h1>404 not found.</h1>' );
        }else{
            return $p404; //ziyo::require( $p404['component'] );
        }
    }

}