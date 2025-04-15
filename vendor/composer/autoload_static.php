<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd6805619561024778b7748b20a6ba00b
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/clases',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd6805619561024778b7748b20a6ba00b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd6805619561024778b7748b20a6ba00b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd6805619561024778b7748b20a6ba00b::$classMap;

        }, null, ClassLoader::class);
    }
}
