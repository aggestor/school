<?php

namespace Routes;

use App\Exceptions\NotFoundException;

class Router
{
    public $url;

    /**
     * @var Route[]
     */
    public $routes = [];

    /**
     * Router class constructor
     * @param string $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }
    /**
     * Router GET method
     *
     * @param string $path router url
     * @param string $action method to execute the route
     * @return void
     */
    public function get(string $path, $action, ?string $paramsNames = null)
    {
        $this->addRoute("GET", $path, $action, $paramsNames);
    }
    /**
     * Router POST method
     *
     * @param string $path router url
     * @param string $action method to execute the route
     * @return void
     */

    public function post(string $path, string $action, ?string $paramsNames = null)
    {
        $this->addRoute("POST", $path, $action, $paramsNames);
    }

    /**
     * Main method of a route
     * @param string $path
     * @param string $action
     * @param string $paramsName
     */
    public function addRoute(string $method, string $path, $action, ?string $paramsNames = null): void
    {
        $this->routes[$method][] = new Route($path, $action, $paramsNames);
    }
    /**
     * For executing different routes
     * @return void
     */
    public function run()
    {

        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            $matches = $route->matches($this->url);
            if ($matches !== false) {

                if (!empty($route->getParamsNames())) {
                    $params = [];
                    foreach ($route->getParamsNames() as $key => $name) {
                        $params[$name] = $matches[$key + 1];
                    }

                    $_GET = array_merge($_GET, $params);
                }
                try {
                    return $route->execute();
                } catch (\Exception $th) {
                    throw new NotFoundException("Une erreur est survenue dans le processuce de generation de la page: {$th->getMessage()}");
                }
            }
        }

        throw new NotFoundException("La page demandée n'a pas été trouvé");
    }
}
