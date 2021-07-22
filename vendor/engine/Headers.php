<?php 

 /*
 |--------------------------------------------------------------------------
 | HTTP headers Конфигурационный класс
 |--------------------------------------------------------------------------
 |
 | Здесь вы можете настроить параметры заголовков по умолчанию
 | Класс определяет, какие кодировки и заголовки использовать по умолчанию
 | в веб-браузерах. Вы можете настроить эти параметры по мере необходимости.
 |
 | Подробнее: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers
 |
 */

namespace Roast;
use Roast\Environment;
class Headers
{
    /**
     * ReturnDefaultHeaders
     * Возвращает текстовый контент-тайп заголовка
     * @return void
     */
    public static function ReturnDefaultHeaders() 
    { 
        header('Content-Type: text/html; charset=utf-8');
    }
    /**
     * ReturnJSONHeaders
     * Возвращает JSON контент-тайп заголовка
     * @return void
     */
    public static function ReturnJSONHeaders() 
    { 
        header('Content-Type: application/json; charset=utf-8');
    }
}
?>