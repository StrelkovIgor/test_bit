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
    private $section = [];
    public function __construct($nametpl)
    {
        parent::__construct();
        $this->tpl = $nametpl;
    }

    public function run()
    {
        $html = $this->data;
        $tpl = $this;
        $result = @include( _App_ . "/tpl/" . $this->tpl .".php");
        return $result;
    }

    public function section()
    {
        ob_start();
    }

    public function endSection($name)
    {
        $this->section[$name] =ob_get_clean();
    }

    public function getSection($name)
    {
        return isset($this->section[$name])?$this->section[$name]: null;
    }

    public function advanced($name)
    {
        $html = $this->data;
        $tpl = $this;
        $r = @include( _App_ . "/tpl/" . $name .".php");
        return $r;
    }
}