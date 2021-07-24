<?php 

 /*
 |--------------------------------------------------------------------------
 | Файл обработки переменных окружения SDFramework
 |--------------------------------------------------------------------------
 |
 | Эти значения импортируются в глобальное пространство имен PHP
 | из системных переменных окружения, в котором запущен парсер PHP. Большинство
 | значений передаётся из командной оболочки, под которой PHP запущен, и различных
 | системных приложений, полного и точного списка не существует.
 | Подробнее: 
 |
 */

namespace Roast;

class Environment
{

    private $dotenv;

    /**
     * __construct
     *
     * @return void
     * @throws \ErrorException
     */
        public function __construct()
    {
        if(!file_exists("../.env"))
        {
            throw new \ErrorException('Environment file (.env) is not found. If this is the first launch of the application - create .env from the example .env.example.', 1);
        }
        else
        {
            $this->dotenv = \Dotenv\Dotenv::createImmutable('../.');
            $this->dotenv->load();
        }

    }
}