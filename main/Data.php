<?php
/**
 * Created by PhpStorm.
 * User: crash
 * Date: 29.10.2019
 * Time: 22:30
 */
use \pattern\Singleton;

class Data extends Singleton
{
    private $data = [];

    public function __get($name)
    {
        return isset($this->data[$name]) ? $this->data[$name]: null;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

}