<?php 
namespace Roast;
use \Roast\Controller;
use \Roast\Router;
use \Roast\Environment;
use \Roast\Cors;
use \Roast\ExceptionHandler;
use \Roast\Headers;
use \DebugBar\StandardDebugBar;
use \RedBeanPHP\R as R;

/**
* Класс Pub отвечает за собрание всех экземпляров классов воедино
* и их инкапсуляция в главную точку входа /public/index.php
*/
class Engine
{
    private $environment;
    private $cors;
    private $exception;
    private $headers;
    private $cache;
    private $response;

    /**
     * __construct
     * Конструктор главного класса
     * @return void
     */
    public function __construct()
    {
            $this->environment = new Environment();
            $this->cors = new Cors();
            Headers::ReturnDefaultHeaders();
            $this->exception = new ExceptionHandler();
            $this->cors->ReturnCorsHeader();
            $this->response= new Response();
            $this->response->ReturnResponseCode(200);
    }

    /**
     * require_dir
     * Вспомогательный метод сбора контроллеров и роутов;
     * @param mixed $dir
     * @param mixed $sort=0
     * @return array
     */
    private function require_dir($dir, $sort=0)
    {
        
        $list = scandir($dir, $sort);
        if (!$list) return false;
        if ($sort == 0) unset($list[0],$list[1]);
        else unset($list[count($list)-1], $list[count($list)-1]);
        $i = 0;
        $resp = array();
        foreach ($list as $rel) 
        {           
            $resp[$i] = $dir.'/'.$rel;
            $i++;
        }
        return $resp;
    }

    /**
     * run
     * Запускает фреймворк
     * Инкапсулируется в /public/index.php
     * @return void
     */
    public function run()
    {
        $route = new \Roast\Router;
        $routes = $this->require_dir(__DIR__."/../../routes");
        foreach ($routes as $router)
        {
            require($router);          
        } 
        $route->run();

    }
}
