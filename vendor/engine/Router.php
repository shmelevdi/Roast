<?php 
//Обработчик роутов
// @Router.php

namespace Roast;
use Roast\Environment;

class Router
{
    /**
     * middleware
     * Прослойка для Bramus Router
     * @return void
     */
    public function middleware()
    {
        $router = new \Bramus\Router\Router();
        return $router;
    }
     
}

?>