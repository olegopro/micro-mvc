<?php

namespace App\System\View;

class View implements IView
{
    //private $basePath;
    //private $templatePath;

    public function __construct($basePath, $templatePath)
    {
        $this->basePath = $basePath;
        $this->templatePath = $templatePath;
    }

    public function render($path, $params = [])
    {
        extract($params);

        ob_start();
        if (!include($this->basePath . '/' . $this->templatePath . '/' . $path . '.php')) {
            throw new \Exception('Test');
        }

        return ob_get_clean();
    }
}
