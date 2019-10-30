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

class Index extends MainController
{
    public function index()
    {
        $this->data->content = "Тестовое задание";
        return new Html('template');
    }

    public function writeoff()
    {
        return new Html('writeoff');
    }

    public function writeoffPost()
    {
        $user = Users::getUser();
        Users::update();
        $summ = (float) $_POST['coin'];
        if($summ < 0) $this->data->error = "Введите положительную сумму";
        if($summ > $user['coin']) $this->data->error = "Сумма превышает баланс";

        if(!$this->data->error){
            Users::writeoff($summ);
            header("Location: /writeoff"); exit;
        }

        return $this->writeoff();
    }


}