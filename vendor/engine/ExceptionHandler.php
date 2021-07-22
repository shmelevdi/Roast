<?php 
//Обработчик исключений
// @ExceptionHandler.php

namespace Roast;
use Roast\Environment;

//Класс
class ExceptionHandler
{
    public static function Facade($exception=null, $type="JSON")
    {
        ob_end_clean();
        $file = $exception->getFile();
        $msg = $exception->getMessage();
        $line = $exception->getLine();
        $phperror = (object)["code"=>$exception->getCode(), "file"=>$file, "line"=>$line, "trace"=>$exception->getTrace()];
        $error = (object)["event"=>"Fatal error", "event_code"=>1, "msg"=>$msg, "details"=>$phperror];
        $trace = $exception->getTraceAsString();
        if($type == "JSON") Response::JSON($error);
        if($type == "TEXT") Response::Text("<b>Event:</b> Fatal error 
                                                    <br> <b>Message:</b> $msg 
                                                    <br> <b>Error trace:</b> $trace
                                                    <br> <b>File:</b> $file in <b>$line</b> line>");
    }

}