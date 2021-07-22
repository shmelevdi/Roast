<?php
//Точка входа в приложение
// @App.php
namespace Roast;

use Roast\Console\Colors;
use Roast\Console\ControllersConsole;

class Console
{
    private $shortopts  = "";
    private $longopts  = "";
    private $return;
    private $controllers;
    /**
     * @var string[]
     */


    public function __construct()
    {
        $this->return = new Colors();
        $this->controllers = new ControllersConsole();
        $this->shortopts .= "v";  // Вывод версии
        $this->longopts  = array(
            "version",     // Вывод версии
            "make:controller:",     // Создать контроллер
            "clear:cache",    // Очистка кэша
            "server:start",        // Сервер
            "server:restart",        // Сервер
            "server:stop",        // Сервер
        );
        $options = getopt($this->shortopts, $this->longopts);
        if(array_key_exists("v", $options) || array_key_exists("version", $options)) $this->Version();
        if(array_key_exists("make:controller", $options)) $this->controllers->Make($options["make:controller"]);

    }

    private function Version()
    {
        print $this->return->getColoredString("The Roast PHP-Framework 1.2\nRoast CLI 1.0", "green");
    }

}