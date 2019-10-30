<?php
/**
 * Created by PhpStorm.
 * User: crash
 * Date: 29.10.2019
 * Time: 23:33
 */
namespace view;

use view\ViewInterface;

class Html extends \View implements ViewInterface
{
    protected $tpl = null;
    public function __construct($nametpl)
    {
        parent::__construct();
        $this->tpl = $nametpl;
    }

    public function run()
    {
        ob_start();
        $html = $this->data;
        include( _App_ . "/tpl/" . $this->tpl .".php");
        $result = ob_get_clean();
        ob_end_clean();
        return $result;
    }
}