<?php
/**
 * Created by PhpStorm.
 * User: crash
 * Date: 30.10.2019
 * Time: 0:47
 */
use \pattern\Singleton;

class DB extends Singleton
{
    protected $c = null;
    protected $exeption = null;

    private $type = [
        'string' => 2,
        'integer' => 1,
        'boolean' => 5,
        'NULL' => 0,
        'double' => 2,
    ];

    public function __construct()
    {
        $cfg = S('Config');
        try
        {
            $this->c = new PDO("{$cfg->db_type}:host={$cfg->db_host};dbname={$cfg->db_table}", $cfg->db_login, $cfg->db_password);
            $this->c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->c->exec("set names {$cfg->db_charset}");
        }
        catch (\PDOException $e)
        {
            $this->exeption = $e;
        }
    }

    public function fetchAllCal($query, $callable)
    {
        $query = $this->c->query($query);
        if (is_callable($callable))
        {
            $query->setFetchMode(PDO::FETCH_ASSOC);
            while ($row = $query->fetch())
            {
                $callable($row);
            }
        }
    }

    public function queryPrepare($query,$data = []){
        $q = $this->c->prepare($query);
        foreach ($data as $key => $item){
            $q->bindValue($key + 1, $item, $this->type[gettype($item)]);
        }
        $q->execute();
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updatePrepare($query,$data = []){
        $q = $this->c->prepare($query);
        $q->execute($data);
    }

}