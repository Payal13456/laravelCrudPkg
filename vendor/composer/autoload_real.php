<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit9fd600fe1f28f1e837dc42827ca257fd
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit9fd600fe1f28f1e837dc42827ca257fd', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit9fd600fe1f28f1e837dc42827ca257fd', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit9fd600fe1f28f1e837dc42827ca257fd::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
