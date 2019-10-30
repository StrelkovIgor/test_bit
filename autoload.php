<?php
/**
 * Created by PhpStorm.
 * User: crash
 * Date: 29.10.2019
 * Time: 19:42
 */


defined('_Public_') or die("No entry point");
define('_Path_', __DIR__);
define('_App_', __DIR__ . "/app");

require _Path_ ."/main/Loader.php";

main\Loader::init();

function S($class)
{
    try
    {
        return $class::getInstance();
    }
    catch (\Error $e)
    {
        throw new \Exception("There is no such syngolton");
    }
}

S('Application')->run();


