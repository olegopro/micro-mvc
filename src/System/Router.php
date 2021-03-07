<?php

namespace App\System;

class Router
{
    private $action;
    private $params;
    private $controller;
    private $requestUrl = '';

    public function __construct()
    {
        $zapros = $_SERVER['REQUEST_URI'];
        $requestUrl = substr($zapros, strlen(SITE_URL));

        $url = explode('/', rtrim($requestUrl, '/'));

        $this->controller = 'App\\Controller\\';

        if (!empty($url[0])) {
            $this->controller .= ucfirst($url[0]) . '_Controller';
        } else {
            $this->controller .= 'Index_Controller';
        }

        if (!empty($url[1])) {
            $this->action .= $url[1] . 'Action';
        } else {
            $this->action .= 'indexAction';
        }

        if (!empty($url[2])) {
            $count = count($url);

            $key = [];
            $value = [];

            for ($i = 2; $i < $count; $i++) {
                if ($i % 2 == 0) {
                    $key[] = $url[$i];
                } else {
                    $value[] = $url[$i];
                }
            }

            if (!$this->params = array_combine($key, $value)) {
                throw new \Exception('Error request');
            }
        }
    }

    public function processRequest()
    {
        if (class_exists($this->controller)) {
            $ref = new \ReflectionClass($this->controller);

            if ($ref->hasMethod($this->action)) {
                if ($ref->isInstantiable()) {
                    $class = $ref->newInstance();
                    $method = $ref->getMethod($this->action);

                    $method->invoke($class, $this->params);
                }
            }
        } else {
            throw new \Exception('Page Error');
        }
    }
}
