<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitaaee35f85aa73183e3dead33292aa101
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Hp\\Opdracht1oop\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Hp\\Opdracht1oop\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitaaee35f85aa73183e3dead33292aa101::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitaaee35f85aa73183e3dead33292aa101::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitaaee35f85aa73183e3dead33292aa101::$classMap;

        }, null, ClassLoader::class);
    }
}
