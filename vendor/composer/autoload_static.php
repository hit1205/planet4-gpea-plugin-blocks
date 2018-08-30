<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit336100170ff2882375cd04c4c76f9df3
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'P4NLBKS\\Controllers\\Menu\\' => 25,
            'P4NLBKS\\Controllers\\Blocks\\' => 27,
            'P4NLBKS\\Controllers\\' => 20,
            'P4NLBKS\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'P4NLBKS\\Controllers\\Menu\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes/controller/menu',
        ),
        'P4NLBKS\\Controllers\\Blocks\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes/controller/blocks',
        ),
        'P4NLBKS\\Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes/controller',
        ),
        'P4NLBKS\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static $classMap = array (
        'P4NLBKS\\Controllers\\Blocks\\Controller' => __DIR__ . '/../..' . '/classes/controller/blocks/class-controller.php',
        'P4NLBKS\\Controllers\\Blocks\\Donation_Controller' => __DIR__ . '/../..' . '/classes/controller/blocks/class-donation-controller.php',
        'P4NLBKS\\Controllers\\Blocks\\Force_Form_Old_Controller' => __DIR__ . '/../..' . '/classes/controller/blocks/class-forceform-controller.php',
        'P4NLBKS\\Controllers\\Blocks\\Petition_Controller' => __DIR__ . '/../..' . '/classes/controller/blocks/class-petition-controller.php',
        'P4NLBKS\\Controllers\\Menu\\Controller' => __DIR__ . '/../..' . '/classes/controller/menu/class-controller.php',
        'P4NLBKS\\Controllers\\Menu\\Settings_Controller' => __DIR__ . '/../..' . '/classes/controller/menu/class-settings-controller.php',
        'P4NLBKS\\Controllers\\Uninstall_Controller' => __DIR__ . '/../..' . '/classes/controller/class-uninstall-controller.php',
        'P4NLBKS\\Loader' => __DIR__ . '/../..' . '/classes/class-loader.php',
        'P4NLBKS\\Views\\View' => __DIR__ . '/../..' . '/classes/view/class-view.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit336100170ff2882375cd04c4c76f9df3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit336100170ff2882375cd04c4c76f9df3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit336100170ff2882375cd04c4c76f9df3::$classMap;

        }, null, ClassLoader::class);
    }
}
