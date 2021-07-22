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
        $this->app = (new \Roast\Engine())->run();
    }

    public static function Ver()
    {
        Headers::ReturnJSONHeaders();
        return json_encode((object)["app_name"=>$_ENV['APP_NAME'], "app_version"=>"1.0", "framework"=>"Roast 1.1"]);
    }

}