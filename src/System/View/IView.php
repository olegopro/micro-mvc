<?php

namespace App\System\View;

interface IView
{
    public function render($path, $params = []);
}
