<?php
/**
 * Created by PhpStorm.
 * User: crash
 * Date: 30.10.2019
 * Time: 0:29
 */
use \pattern\Singleton;

class Config extends Singleton
{
    protected $_cfgdir = 'config';
    protected $_config = array();
    protected $_name;

    public function __construct()
    {
        $this->_use('app');
    }

    public function set($name)
    {
        $this->_use('app');
        $this->_use($name, true);
        $this->_name = $name;
    }

    public function apply($name)
    {
        $name = "{$this->_name}-$name";
        $this->_use($name, true);
    }

    public function __get($name)
    {
        if( !isset($this->_config[$name]) )
        {
            throw new \Exception("Config option `$name' is invalid");
        }

        return $this->_config[$name];
    }

    protected function _use($name, $incremental = false)
    {
        $name = preg_replace('/[^\w-]/', '', $name);
        $filename = _Path_ . "/{$this->_cfgdir}/$name.php";

        if( !is_readable($filename) )
        {
            throw new \Exception("Config `$name' is invalid");
        }

        $this->_config = $incremental
            ? array_merge($this->_config, include($filename))
            : include($filename);
    }

}