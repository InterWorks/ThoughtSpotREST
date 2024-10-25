<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7e36a2233f19cd56a9d5b02020d22b52
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'InterWorks\\ThoughtSpotREST\\' => 27,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'InterWorks\\ThoughtSpotREST\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit7e36a2233f19cd56a9d5b02020d22b52::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7e36a2233f19cd56a9d5b02020d22b52::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7e36a2233f19cd56a9d5b02020d22b52::$classMap;

        }, null, ClassLoader::class);
    }
}
