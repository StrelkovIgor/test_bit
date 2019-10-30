<?php
/**
 * Created by PhpStorm.
 * User: crash
 * Date: 29.10.2019
 * Time: 19:15
 */
namespace pattern;

class Singleton implements SingletonInterface
{

    private static $_instances = array();

    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}

    public static function getInstance()
    {
        $className = get_called_class();

        if( !isset(self::$_instances[$className]) )
        {
            self::$_instances[$className] = new static();
        }

        return self::$_instances[$className];
    }

}