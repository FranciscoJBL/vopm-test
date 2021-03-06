<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit928f7594bb342907b8a66311985dda51
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'AndainTest\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'AndainTest\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit928f7594bb342907b8a66311985dda51::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit928f7594bb342907b8a66311985dda51::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit928f7594bb342907b8a66311985dda51::$classMap;

        }, null, ClassLoader::class);
    }
}
