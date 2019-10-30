<?php
/**
 * Created by PhpStorm.
 * User: crash
 * Date: 29.10.2019
 * Time: 18:54
 */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_write_close();
session_start();

define('_Public_', __DIR__);

require _Public_ ."/../autoload.php";
