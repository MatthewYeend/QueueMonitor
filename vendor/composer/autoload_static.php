<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit788ea4be25141f35296835cfeaa22ece
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Mattyeend\\QueueMonitoring\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Mattyeend\\QueueMonitoring\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit788ea4be25141f35296835cfeaa22ece::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit788ea4be25141f35296835cfeaa22ece::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit788ea4be25141f35296835cfeaa22ece::$classMap;

        }, null, ClassLoader::class);
    }
}
