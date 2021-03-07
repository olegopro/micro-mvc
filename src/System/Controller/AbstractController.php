<?php

namespace App\System\Controller;

use App\System\View\View;

abstract class AbstractController
{
    protected $view;
    protected $page;

    public function __construct()
    {
        $this->view = new View(BASEPATH, TEMPLATE);
    }

    public function get_Page()
    {
        return $this->page;
    }

    public function output()
    {
        echo $this->get_Page();
    }
}
