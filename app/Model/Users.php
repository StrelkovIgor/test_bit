<?php
/**
 * Created by PhpStorm.
 * User: crash
 * Date: 30.10.2019
 * Time: 1:20
 */
namespace Model;

class Users extends \Model
{
    public static function loginIn($login, $passwod)
    {
        $result = self::init()->db->queryPrepare("SELECT * FROM users WHERE login = ? AND password = ? LIMIT 1",[$login, self::genPassword($passwod)]);
        if($result)
        {
            $_SESSION['user'] = $result[0];
        }
        return $result;
    }

    public static function genPassword($password)
    {
        return md5(md5($password));
    }

    public static function getUser()
    {
        return @$_SESSION['user'];
    }

    public static function loginOut()
    {
        unset($_SESSION['user']);
    }

    public static function update()
    {
        $user = self::getUser();
        if($user)
        {
            $result = self::init()->db->queryPrepare("SELECT * FROM users WHERE id = ?",[$user['id']]);
            if($result)
            {
                $_SESSION['user'] = $result[0];
            }
        }
    }

    public static function writeoff($summ)
    {
        $user = self::getUser();
        if(!$user) throw new \Exception("User not found");
        self::init()->db->updatePrepare("UPDATE `users` SET `coin` = `coin` - ".$summ." WHERE `id` = ".$user['id']);

        Writeofflog::writeoff($summ, $user);
        self::update();
    }


}