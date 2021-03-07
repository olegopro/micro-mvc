<?php

namespace App\System;

use App\System\Model\DbDriver;

class App
{
    private $router;
    private $dbDriver;

    public function run()
    {
        $this->dbDriver = DbDriver::get_instance();
        $this->dbDriver->setConnection(HOST, USER, PASS, DB);

        $this->router = new Router();
        $this->router->processRequest();
    }
}
