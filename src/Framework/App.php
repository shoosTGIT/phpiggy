<?php

declare(strict_types=1);

namespace Framework;

class App
{
    private Router $router;
    //private $test;

    public function __construct()
    {
        $this->router = new Router();
        //$this->test = $Test;
    }

    public function run()
    {
        echo "Application is running";
    }
}
