<?php 
//Точка входа в приложение
// @App.php
namespace Roast;

class App
{
    /**
     * __construct
     * Конструктор класса
     * @return Pub
     */
    public $app;
    public function __construct()
    {
        try{
            $this->app = (new \Roast\Engine())->run();
        }
        catch (\Throwable $e)
        {
            ExceptionHandler::Facade($e);
        }
    }

    public static function Ver()
    {
        return (object)["app_name"=>$_ENV['APP_NAME'], "app_version"=>"1.0", "framework"=>"Roast 1.2"];
    }

}