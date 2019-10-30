<?php
/**
 * Created by PhpStorm.
 * User: crash
 * Date: 29.10.2019
 * Time: 22:28
 */

class Controller
{
    protected $data = null;

    public function __construct()
    {
        $this->data = S('Data');
    }

}