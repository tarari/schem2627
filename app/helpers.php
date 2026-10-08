<?php


    function dd(){
        foreach(func_get_args() as $arg){
            echo '<pre>';
            var_dump($arg);
            echo '</pre>';
        }
        die;
    }

    function view(string $path,array $data = []){
        
        if(!file_exists(__DIR__.'/views/'.$path.'.php')) return false; 
        if(!is_array($data)) return false;
        extract($data);
        require_once __DIR__.'/views/'.$path.'.php';
    }