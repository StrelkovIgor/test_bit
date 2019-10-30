<?php
/**
 * Created by PhpStorm.
 * User: crash
 * Date: 30.10.2019
 * Time: 18:47
 */

namespace Controller;

use Model\Users;

class MainController extends \Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data->user = Users::getUser();
    }

}