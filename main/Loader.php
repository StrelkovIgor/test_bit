<?php
/**
 * Created by PhpStorm.
 * User: crash
 * Date: 29.10.2019
 * Time: 19:30
 */
namespace main;

class Loader
{
    private static $dir = ['app','main'];

    public static function init()
    {
        spl_autoload_register(function ($class_name)
        {
            foreach(self::$dir as $dir)
            {
                $file = _Path_ . "/" . $dir . self::class_dir($class_name).'.php';
                if(file_exists($file))
                {
                    include_once($file);
                }
            }
        });
    }
    private static function class_dir($class_name)
    {
        return str_replace('\\','/','\\'.$class_name);
    }

}