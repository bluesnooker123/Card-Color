<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb454e773e170246710603feff4379a89
{
    public static $prefixLengthsPsr4 = array (
        'Z' => 
        array (
            'Zend\\Escaper\\' => 13,
        ),
        'S' => 
        array (
            'Screen\\' => 7,
        ),
        'P' => 
        array (
            'PhpOffice\\PhpWord\\' => 18,
            'PhpOffice\\Common\\' => 17,
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Zend\\Escaper\\' => 
        array (
            0 => __DIR__ . '/..' . '/zendframework/zend-escaper/src',
        ),
        'Screen\\' => 
        array (
            0 => __DIR__ . '/..' . '/microweber/screen/src',
        ),
        'PhpOffice\\PhpWord\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpoffice/phpword/src/PhpWord',
        ),
        'PhpOffice\\Common\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpoffice/common/src/Common',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'PclZip' => __DIR__ . '/..' . '/pclzip/pclzip/pclzip.lib.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb454e773e170246710603feff4379a89::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb454e773e170246710603feff4379a89::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb454e773e170246710603feff4379a89::$classMap;

        }, null, ClassLoader::class);
    }
}
