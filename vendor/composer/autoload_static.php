<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9dc8c646e76e010e34234bc9785f9644
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'corti\\inventtest\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'corti\\inventtest\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9dc8c646e76e010e34234bc9785f9644::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9dc8c646e76e010e34234bc9785f9644::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9dc8c646e76e010e34234bc9785f9644::$classMap;

        }, null, ClassLoader::class);
    }
}
