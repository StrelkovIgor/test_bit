<?php
/**
 * Created by PhpStorm.
 * User: crash
 * Date: 29.10.2019
 * Time: 19:34
 */
namespace Controller;

use view\Html;
use Model\Users;

class Index extends \Controller
{
    public function index()
    {
        return new Html('template');
    }

}