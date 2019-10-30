<?php
/**
 * Created by PhpStorm.
 * User: crash
 * Date: 29.10.2019
 * Time: 20:43
 */

use pattern\Singleton;
use view\Html;

class Application extends Singleton
{
    public function run()
    {
        S('Config')->set('app');
        $tpl = S('Router')->setPath('Routers/Routers')->run();

        if(!$tpl)
        {
           $html = new Html('404');
           $html->run();
        }
    }

}