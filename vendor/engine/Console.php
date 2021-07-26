<?php
/*Roast CLI v.1.0
 @Console.php */

namespace Roast;

use Roast\Console\Colors;
use Roast\Console\ControllersConsole;
use Roast\Console\DatabaseConsole;
use Roast\Console\ServerConsole;

class Console
{
    private $shortopts  = "";
    private $longopts  = "";
    private $return;
    private $controllers;
    private $server;
    private $database;
    /**
     * @var string[]
     */


    public function __construct()
    {
        $this->return = new Colors();
        $this->controllers = new ControllersConsole();
        $this->server = new ServerConsole();
        $this->database = new DatabaseConsole();
        //----------------------------------------------------------------------------------------------------------------------------//
        $this->shortopts .= "v";  // Вывод версии. Пример php roast -v
        $this->shortopts .= "h";  // Вывод помощи. Пример php roast -h
        $this->longopts  = array(
            #Общие команды   - - - - - - - - - - - - - -  - - - - - - - - - - - - - -  - - - - - - - - - - - - - - - - - - - - - - - //
            "version",     // Вывод версии. Пример php roast --version *ISWORK
            "help",     // Вывод помощи. Пример php roast --help

            #Контроллеры  - - - - - - - - - - - - - -   - - - - - - - - - - - - - -   - - - - - - - - - - - - - -   - - - - - - - - - //
            "make:controller:",     // Создать контроллер. Пример: php roast --make:controller Foo/Examples/MyController *ISWORK

            #База данных  - - - - - - - - - - - - - -   - - - - - - - - - - - - - -   - - - - - - - - - - - - - -   - - - - - - - - - //
            "db:test",    // Проверить соединение с базой данных. Пример: php roast --db:test *ISWORK
            "make:migration:",     // Создать миграцию. Пример: php roast --make:migration FooMigration
            // - - - - - - - - - - - - - -  - - - - - - -  - - - - - - -  - - - - - - -  - - - - - - -  - - - - - - -  - - - - - - - //
            "make:model:",     // Создать модель. Пример: php roast --make:model FooModel
            "migration:",     //(make:model:) Создать миграцию вместе с моделью. Пример: php roast --make:model Foo/FooModel --migration
            // - - - - - - - - - - - - - -  - - - - - - -  - - - - - - -  - - - - - - -  - - - - - - -  - - - - - - -  - - - - - - - //
            "make:migrate",     // Провести миграции. Пример: php roast --make:migrate
            "only",     // Провести миграции из сепарированного списка. Пример: php roast --make:migrate --only=240720211714_users_1.php,240720211715_news_2.php

            #Сервис  - - - - - - - - - - - - - -   - - - - - - - - - - - - - -   - - - - - - - - - - - - - -   - - - - - - - - - //
            "clear:cache",    // Очистка кэша

            #Сервер  - - - - - - - - - - - - - -   - - - - - - - - - - - - - -   - - - - - - - - - - - - - -   - - - - - - - - - //
            "server:start",        // Запуск локального веб-сервера. Пример: php roast --server:start *ISWORK
            "host:",        //(server:start) Запуск локального веб-сервера на указанном хосте. Пример: php roast --server:start --host 127.0.0.1:8080 *ISWORK
        );
        $options = getopt($this->shortopts, $this->longopts);
        if(array_key_exists("v", $options) || array_key_exists("version", $options)) $this->Version();

        //Контроллер
        if(array_key_exists("make:controller", $options)) $this->controllers->Make($options["make:controller"]);

        //База данных
        if(array_key_exists("db:test", $options)) $this->database->Test();
        if(array_key_exists("make:migration", $options)) $this->database->MakeMigration($options["make:migration"]);

        //Веб-сервер
        if(array_key_exists("server:start", $options) && array_key_exists("host", $options)) $this->server->Start($options["host"]);
        if(array_key_exists("server:start", $options)) $this->server->Start();

    }

    private function Version()
    {
        print $this->return->getColoredString("The Roast PHP-Framework 1.2\nRoast CLI 1.0", "green");
    }

}