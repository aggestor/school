<?php

namespace App\Exceptions;

use Exception;
use App\Controllers\Controller;
use Throwable;

class NotFoundException extends Exception
{
    public function __construct($message = "", $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
    public function error404($message)
    {
        //require VIEWS . 'pages/404.php';
        http_response_code(404);
        $controller = (new Controller())->view('static.404', 'layouts', ['message' => $message]);
    }
}
