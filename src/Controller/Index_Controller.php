<?php

namespace App\Controller;

use App\Model\User;
use App\System\Controller\AbstractController;

class Index_Controller extends AbstractController
{
    public function indexAction($params = [])
    {
        //$user = new User();
        //$user->login = 'admin';
        //$user->email = 'admin@admin.com';
        //$user->save();

        var_dump(User::find(2));

        $this->page = $this->view->render('index/index', ['title' => 'TITLE']);

        return $this->output();
    }
}
