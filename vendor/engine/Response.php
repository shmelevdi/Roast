<?php

namespace Roast;
use Roast\Environment;
class Response
{
    /**
     * ReturnDefaultHeaders
     * Подготавливает ответ в текстовом формате.
     * Печатает или возвращает готовое значение
     * @param $value
     * @param bool $print
     * @return void
     */
    public static function Text($value, $print=true)
    {
        header('Content-Type: text/html; charset=utf-8');
        if(!$print) return $value;
        else print $value;
    }

    /**
     * ReturnJSONHeaders
     * Подготавливает ответ в формате JSON.
     * Печатает или возвращает готовое значение
     * @param $value
     * @param bool $isjson
     * @param bool $print
     * @return void
     */
    public static function JSON($value, $isjson=false, $print=true)
    {
        header('Content-Type: application/json; charset=utf-8');
        if(!$print)
        {
            if($isjson) return $value;
            else return json_encode($value);
        }
        else
        {
            if($isjson) print $value;
            else print json_encode($value);
        }

    }

    /**
     * ReturnResponseCode
     *
     * @param mixed $arg=200
     * @return void
     */
    public function ReturnResponseCode($arg=200)
    {
        if( $arg==200 || $arg==404 || $arg==403 || $arg==401 || $arg==500)call_user_func(array($this,'Return'.$arg));
    }

    /**
     * Return404
     *
     * @return void
     */
    private function Return404()
    {
        ob_end_clean() ;
        header("HTTP/1.1 404 Not Found");
        exit;
    }

    /**
     * Return403
     *
     * @return void
     */
    private function Return403()
    {
        ob_end_clean() ;
        header("HTTP/1.1 403 Forbidden");
        exit;
    }

    /**
     * Return401
     *
     * @return void
     */
    private function Return401()
    {
        ob_end_clean() ;
        header("HTTP/1.1 401 Unauthorized");
        exit;
    }

    /**
     * Return500
     *
     * @return void
     */
    private function Return500()
    {
        ob_end_clean() ;
        header("HTTP/1.1 500 Internal Server Error");
        exit;
    }

    /**
     * Return200
     *
     * @return void
     */
    private function Return200()
    {
        ob_end_clean() ;
        header("HTTP/1.1 200 OK");
    }
}
