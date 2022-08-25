<?php

namespace Routes;

class Route
{
    public $path;
    public $action;
    public $matches = [];

    /**
     * Parameters names collection
     * @var string[]
     */
    private $paramsNames = [];

    /**
     * @param string $path
     * @param mixed $action
     */
    public function __construct($path, $action, ?string $paramsNames = null)
    {
        $this->action = $action;
        $this->path = $path;

        if ($paramsNames != null) {
            $this->paramsNames = explode(";", $paramsNames);
        }
    }

    /**
     * Comparing pattern with URL
     * @param string $url
     * @return array|bool
     */
    public function matches(string $url)
    {
        $matches = array();
        if (preg_match("#^{$this->path}$#", $url, $matches)) {
            return $matches;
        }
        return false;
    }

    public function getParamsNames()
    {
        return $this->paramsNames;
    }

    public function execute()
    {
        if (is_string($this->action)) {
            $params = explode('@', $this->action);
            $controller = new $params[0]();
            $method = $params[1];
            return isset($this->matches[1]) ? $controller->$method($this->matches[1]) : $controller->$method();
        } else {
            call_user_func_array($this->action, $this->matches);
        }
    }
}
