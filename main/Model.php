<?php
/**
 * Created by PhpStorm.
 * User: crash
 * Date: 30.10.2019
 * Time: 1:36
 */

class Model
{
    protected $db = null;
    public function __construct()
    {
        $this->db = S('DB');
    }

    public static function init(){
        return new self();
    }

}