<?php
//Точка входа в приложение
// @App.php
namespace Roast\Console;
use Roast\Console\Colors;

class ControllersConsole
{
    public $return;
    public function __construct()
    {
        $this->return = new Colors();
    }
    public function Make($arg)
    {
        if(strpos($arg, '\\') || strpos($arg, '/')) {
            $arg = str_replace(['\\', '/'], '/', $arg);
            $exparg = explode('/', $arg);
            $structure = preg_replace('/(.)\1+/', '$1', str_replace($exparg[count($exparg)-1], '', $arg));
            $controllername = $exparg[count($exparg)-1];
            $dir = "controllers/$structure";
            if(!is_dir($dir))
            {
                if (!mkdir($dir, 0775, true)) {
                    $this->return->getColoredString("Failed to create namespace $structure", "red");
                }
            }
            else
            {
                print $this->return->getColoredString("Namespace $structure already exists. OK.", "green");
            }


        }
    }

}