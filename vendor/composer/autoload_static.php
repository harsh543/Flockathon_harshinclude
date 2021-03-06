<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitae5719eb2fce66a1b54077aa1f3921d8
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitae5719eb2fce66a1b54077aa1f3921d8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitae5719eb2fce66a1b54077aa1f3921d8::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
