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
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $dotenv = \Dotenv\Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT'].'/../');
        $dotenv->load();
    }
}

?>