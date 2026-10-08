<?php

namespace App\Core;

class Request
{
    protected string $requestUri;
    protected string $method;
    protected array $get;
    protected array $post;

    public function __construct()
    {
        $this->requestUri=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->get = $_GET ??[];
        $this->post = $_POST ??[];
    }
    function getUri(){
        return $this->requestUri;
    }
    function getMethod(){
        return $this->method;
    }
}