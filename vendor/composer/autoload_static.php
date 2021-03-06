<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit865d3df0793e5cc3da427b86b68a63db
{
    public static $prefixLengthsPsr4 = array (
        'Z' => 
        array (
            'Ziyoren\\HtmlTemplate\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ziyoren\\HtmlTemplate\\' => 
        array (
            0 => __DIR__ . '/..' . '/ziyoren/html-template/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit865d3df0793e5cc3da427b86b68a63db::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit865d3df0793e5cc3da427b86b68a63db::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit865d3df0793e5cc3da427b86b68a63db::$classMap;

        }, null, ClassLoader::class);
    }
}
