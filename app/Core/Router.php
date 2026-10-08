<?php

namespace App\Core;

use App\Core\Request;

class Router
{
    private array $routes = [];
    protected Request $request;

    public function __construct(){
        $this->request=new Request();
        $this->routes = require __DIR__.'/../config/routes.php';
        
        try{
            $this->dispatch();
        }catch(\Exception $e){
            //falta fgestió d'erro
            return view('404');
        }

    }

    private function dispatch(){
        foreach($this->routes as $route){
            if($route['path']===$this->request->getUri() && $route['method']===$this->request->getMethod()){
                $this->execute($route);
            }else{
                throw new \RuntimeException('Ruta no existent');
            }
        }
    }
    private function execute(array $route){
        
            $arrHandler=$route['handler'];
            $classController = new $arrHandler[0]();
            if(method_exists($classController,$arrHandler[1])){
                call_user_func_array([$classController,$arrHandler[1]],[$this->request]);
            }else{
                throw new \RuntimeException('Metode no existent');
            }
           
        
    }
}