<?php
/**
 * Created by PhpStorm.
 * User: crash
 * Date: 29.10.2019
 * Time: 21:10
 */

use \pattern\Singleton;

class Rout extends Singleton
{
    private $route = [];
    public $uri = null;

    const GET = 'GET';
    const POST = 'POST';
    const PUT = 'PUT';
    const DELETE = 'DELETE';

    const METHOD = [self::GET, self::POST, self::PUT, self::DELETE];

    public function __construct(){
        $this->uri = parse_url($_SERVER['REQUEST_URI']);
    }

    public static function get($url, $controller)
    {
        return self::getInstance()->setRequest(self::GET, $url, $controller);
    }

    public static function post($url, $controller)
    {
        return self::getInstance()->setRequest(self::POST, $url, $controller);
    }

    public static function match(Array $method, $url, $controller)
    {
        return self::getInstance()->setRequest($method, $url, $controller);
    }

    public function where(Array $data)
    {
        $class = $this->getLastRouter();
        $class->where = $data;
        $class->url = $this->replace($class->url, $data);
        $this->isRedirect();
        return $this;
    }

    public function getAction($one = false)
    {
        $clussRun = $one ? null: [];
        if(count($this->route))
        {
            foreach ($this->route as $class)
            {
                if (@$class->select)
                {
                    if($one)
                    {
                        $clussRun = $class;
                        break;
                    }
                    else $clussRun[] = $class;
                }
            }
        }
        usort($clussRun, [$this, 'sortZIndex']);
        return $clussRun;
    }

    private function setRequest($method, $url, $controller)
    {
        $class = new \stdClass();
        $class->method = is_array($method)?$method:[$method];
        $class->url = $url;
        $class->controller = $controller;
        $this->route[] = $class;
        $this->isRedirect();
        return $this;
    }

    public function getLastRouter()
    {
        if(isset($this->route[count($this->route)-1]))
        {
            return $this->route[count($this->route)-1];
        }
    }

    private function isRedirect()
    {
        $class = $this->getLastRouter();
        $url = $this->uri['path']?$this->uri['path']:'/';
        if(preg_match("|^".$class->url."$|", $url, $match) && in_array($_SERVER['REQUEST_METHOD'],$class->method))
        {
            $class->select = true;
            $class->getMatch = $match;
            if(@$class->where)
            {
                $i = 1;
                $class->get = [];
                foreach ($class->where as $key => $value)
                {
                    $class->get[] = [$key => $match[$i]];
                    $i++;
                }
            }
        }
    }

    private function replace($text, $data = [])
    {
        if(!count($data)) return $text;
        return preg_replace_callback('/:([a-zA-Z0-9]+)\|?/', function($search) use ($data){
            return isset($data[$search[1]])?$data[$search[1]]:'';
        },$text);
    }

    public function sortZIndex($a, $b)
    {
        return (int) $a->zIndex >= (int) $b->zIndex;
    }

}