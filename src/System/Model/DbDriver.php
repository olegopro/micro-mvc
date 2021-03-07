<?php

namespace App\System\Model;

class DbDriver implements IDbDriver
{
    private static $_instance;
    private $instanceDB;

    private function __construct()
    {
    }

    public static function get_instance()
    {
        if (self::$_instance instanceof static) {
            return self::$_instance;
        }

        return self::$_instance = new static();
    }

    public
    function setConnection($host, $user, $pass, $db)
    {
        try {
            $this->instanceDB = new \mysqli($host, $user, $pass, $db);

            if ($this->instanceDB->connect_error) {
                throw new \Exception('Ошибка соеденения : ' . $this->instanceDB->connect_errno);
            }

            $this->instanceDB->query("SET NAMES 'UTF8'");
        } catch (\Exception $e) {
            exit();
        }
    }

    public function query($sql)
    {
        return $this->instanceDB->query($sql);
    }

    public function getInstanceDB()
    {
        return $this->instanceDB;
    }
}
