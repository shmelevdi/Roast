<?php

namespace Roast;
use Roast\Environment;
class Response
{
    /**
     * ReturnDefaultHeaders
     * Возвращает текстовый контент-тайп заголовка
     * @return void
     */
    public static function Text($value)
    {
        header('Content-Type: text/html; charset=utf-8');
        return $value;
    }
    /**
     * ReturnJSONHeaders
     * Возвращает JSON контент-тайп заголовка
     * @return void
     */
    public static function JSON($value)
    {
        header('Content-Type: application/json; charset=utf-8');
        return $value;
    }
}
