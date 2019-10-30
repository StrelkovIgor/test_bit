<?php
/**
 * Created by PhpStorm.
 * User: crash
 * Date: 30.10.2019
 * Time: 19:55
 */

namespace Model;


class Writeofflog extends \Model
{
    public static function writeoff($summ, $user)
    {
        self::init()->db->updatePrepare("INSERT INTO writeofflog(id_user, coin, balance) VALUES (:user, :sum, :balance)",[":user" =>(int) $user['id'], ":sum"=> $summ * -1, ":balance" =>$user['coin']]);
    }

}