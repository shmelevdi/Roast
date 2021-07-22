<?php
namespace Roast\Controllers\Regular;
use Roast\App;
use Roast\Controller;
use Roast\Environment;
use Roast\ExceptionHandler;
use Roast\Headers;
use Roast\Response;

class TestController extends Controller
{

    /**
     * welcome
     * Главная страница фреймворка
     * @return void
     */
    public static function test()
    {
        echo Response::JSON(json_encode(["val"=>"test"]));
    }
}