<?php

namespace App\System\Model;

interface IDbDriver
{
    public function setConnection($host, $user, $pass, $db);

    public function query($sql);

    public function getInstanceDB();
}
