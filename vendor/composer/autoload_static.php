<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit020abe5802a87285c228ed1ba3f4990b
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit020abe5802a87285c228ed1ba3f4990b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit020abe5802a87285c228ed1ba3f4990b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit020abe5802a87285c228ed1ba3f4990b::$classMap;

        }, null, ClassLoader::class);
    }
}