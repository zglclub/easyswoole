<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd9d81f7249bfa1a9ad98d5d1247ef276
{
    public static $files = array (
        'bd9634f2d41831496de0d3dfe4c94881' => __DIR__ . '/..' . '/symfony/polyfill-php56/bootstrap.php',
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Util\\' => 22,
            'Symfony\\Polyfill\\Php56\\' => 23,
            'SuperClosure\\' => 13,
        ),
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
            'PhpParser\\' => 10,
        ),
        'F' => 
        array (
            'FastRoute\\' => 10,
        ),
        'E' => 
        array (
            'EasySwoole\\Validate\\' => 20,
            'EasySwoole\\Utility\\' => 19,
            'EasySwoole\\Trigger\\' => 19,
            'EasySwoole\\Task\\' => 16,
            'EasySwoole\\Spl\\Test\\' => 20,
            'EasySwoole\\Spl\\' => 15,
            'EasySwoole\\Pay\\' => 15,
            'EasySwoole\\Mysqli\\Tests\\' => 24,
            'EasySwoole\\Mysqli\\' => 18,
            'EasySwoole\\Log\\' => 15,
            'EasySwoole\\Http\\' => 16,
            'EasySwoole\\HttpClient\\Test\\' => 27,
            'EasySwoole\\HttpClient\\' => 22,
            'EasySwoole\\EasySwoole\\Test\\' => 27,
            'EasySwoole\\EasySwoole\\' => 22,
            'EasySwoole\\Config\\Test\\' => 23,
            'EasySwoole\\Config\\' => 18,
            'EasySwoole\\Component\\Tests\\' => 27,
            'EasySwoole\\Component\\' => 21,
        ),
        'C' => 
        array (
            'Cron\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Util\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-util',
        ),
        'Symfony\\Polyfill\\Php56\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-php56',
        ),
        'SuperClosure\\' => 
        array (
            0 => __DIR__ . '/..' . '/jeremeamia/superclosure/src',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'PhpParser\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/php-parser/lib/PhpParser',
        ),
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
        'EasySwoole\\Validate\\' => 
        array (
            0 => __DIR__ . '/..' . '/easyswoole/validate/src',
        ),
        'EasySwoole\\Utility\\' => 
        array (
            0 => __DIR__ . '/..' . '/easyswoole/utility/src',
        ),
        'EasySwoole\\Trigger\\' => 
        array (
            0 => __DIR__ . '/..' . '/easyswoole/trigger/src',
        ),
        'EasySwoole\\Task\\' => 
        array (
            0 => __DIR__ . '/..' . '/easyswoole/task/src',
        ),
        'EasySwoole\\Spl\\Test\\' => 
        array (
            0 => __DIR__ . '/..' . '/easyswoole/spl/test',
        ),
        'EasySwoole\\Spl\\' => 
        array (
            0 => __DIR__ . '/..' . '/easyswoole/spl/src',
        ),
        'EasySwoole\\Pay\\' => 
        array (
            0 => __DIR__ . '/..' . '/easyswoole/pay/src',
        ),
        'EasySwoole\\Mysqli\\Tests\\' => 
        array (
            0 => __DIR__ . '/..' . '/easyswoole/mysqli/tests',
        ),
        'EasySwoole\\Mysqli\\' => 
        array (
            0 => __DIR__ . '/..' . '/easyswoole/mysqli/src',
        ),
        'EasySwoole\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/easyswoole/log/src',
        ),
        'EasySwoole\\Http\\' => 
        array (
            0 => __DIR__ . '/..' . '/easyswoole/http/src',
        ),
        'EasySwoole\\HttpClient\\Test\\' => 
        array (
            0 => __DIR__ . '/..' . '/easyswoole/http-client/tests',
        ),
        'EasySwoole\\HttpClient\\' => 
        array (
            0 => __DIR__ . '/..' . '/easyswoole/http-client/src',
        ),
        'EasySwoole\\EasySwoole\\Test\\' => 
        array (
            0 => __DIR__ . '/..' . '/easyswoole/easyswoole/tests',
        ),
        'EasySwoole\\EasySwoole\\' => 
        array (
            0 => __DIR__ . '/..' . '/easyswoole/easyswoole/src',
        ),
        'EasySwoole\\Config\\Test\\' => 
        array (
            0 => __DIR__ . '/..' . '/easyswoole/config/tests',
        ),
        'EasySwoole\\Config\\' => 
        array (
            0 => __DIR__ . '/..' . '/easyswoole/config/src',
        ),
        'EasySwoole\\Component\\Tests\\' => 
        array (
            0 => __DIR__ . '/..' . '/easyswoole/component/Tests',
        ),
        'EasySwoole\\Component\\' => 
        array (
            0 => __DIR__ . '/..' . '/easyswoole/component/src',
        ),
        'Cron\\' => 
        array (
            0 => __DIR__ . '/..' . '/dragonmantank/cron-expression/src/Cron',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd9d81f7249bfa1a9ad98d5d1247ef276::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd9d81f7249bfa1a9ad98d5d1247ef276::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
