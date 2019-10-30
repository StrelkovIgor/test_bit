<?php
/**
 * Created by PhpStorm.
 * User: crash
 * Date: 29.10.2019
 * Time: 19:43
 */

use pattern\Singleton;

class Router extends Singleton
{

    public function run()
    {
        $clussRun = S('Rout')->getAction();
        if(count($clussRun))
        {
            $classExe = [];
            foreach($clussRun as $cCreate)
            {
                if(@$cCreate->policy === null || @$cCreate->policy === true)
                {
                    list($class, $method) = explode('@',$cCreate->controller);
                    if (class_exists($class))
                    {
                        $c = new $class();
                        if(method_exists($c, $method))
                        {
                            $classExe[] = $c->$method();
                        }
                        elseif(method_exists($c, 'index'))
                        {
                            $classExe[] = $c->index();
                        }
                    }
                }
            }
            if(count($classExe))
            {
                $result = null;
                foreach ($classExe as $cl)
                {
                    if(is_object($cl))
                    {
                        $result = $cl;
                    }
                    elseif(is_string($cl) && !is_object($result))
                    {
                        $result = $cl;
                    }
                    elseif($cl === true)
                    {
                        $result = '';
                    }
                }
                if(is_object($result) && method_exists($result, 'run'))
                    return $result->run();
                else
                    return $result;
            }
        }
        return null;
    }

    public static function getAction($one = false)
    {
        $t = self::init();
        $clussRun = $one ? null: [];
        if(count($t->route))
        {
            foreach ($t->route as $class)
            {
                if ($class->select)
                {
                    if($one)
                    {
                        $clussRun = $class;
                        break;
                    }
                    else
                        $clussRun[] = $class;
                }
            }
        }
        return $clussRun;
    }
    public function setPath($path)
    {
        $path = _App_ . "/" . $path.".php";
        if(file_exists($path))
            include_once $path;

        return $this;
    }

}