<?php

namespace App\Core;

class Router
{
    private array $routes = [];

    public function __construct(){
        $this->routes = require __DIR__.'/../../routes.php';
    }

    private function dispatch(){

    }
    private function handle(){
        
    }
}