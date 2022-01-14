<?php

namespace App\Services\Router;

class Router
{
    protected $request;

    protected $response;

    public static $routes = [];

    protected $matchRoutes = [];

    protected $allowedMethods = [];
    
    /**
     * loadRoutes
     *
     * @return Router
     */
    public function loadRoutes(): Router
    {
        $router = new static($this->request, $this->response);

        require __DIR__ . '/../../../routes.php';

        return $router;
    }

    public function get()
    {
    }

    public function post()
    {
    }
}
