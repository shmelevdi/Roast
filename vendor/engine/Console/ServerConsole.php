<?php
namespace Roast\Console;

class ServerConsole
{
    public $return;
    public function __construct()
    {
        $this->return = new Colors();
    }

    public function Start($host=null)
    {
        chdir("../public");
        $default_host ="127.0.0.1:8081";
        if($host==null)$host = $default_host;
        print $this->return->getColoredString("Web-server listen on $host..." . PHP_EOL, "yellow");
        exec("php -S $host");
    }

}