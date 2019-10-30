<?php
/**
 * Created by PhpStorm.
 * User: crash
 * Date: 29.10.2019
 * Time: 22:11
 */

namespace Controller;

use view\Html;
use Model\Users as u;

class Users extends MainController
{
    public function __construct()
    {
        parent::__construct();
        $c = S('Rout')->getController();
        if (u::getUser() && $c[1] != 'loginOut')
        {
            header("Location: /"); exit;
        }
    }

    public function login()
    {
        return new Html('user/login');
    }

    public function loginPost(){
        if(u::loginIn($_POST['login'], $_POST['password']))
        {
            header("Location: /"); exit;
        }
        else
        {
            $this->data->error = "Не верный логи или пароль";
            return $this->login();
        }
    }

    public function loginOut(){
        u::loginOut();
        header("Location: /"); exit;
    }

}