<?php
/**
 * Created by PhpStorm.
 * User: crash
 * Date: 29.10.2019
 * Time: 23:30
 */
use view\ViewInterface;

class View implements ViewInterface
{
    protected $data = null;
    public function __construct()
    {
        $this->data = S('Data');
    }

    public function run(){}

}