<?php
//Точка входа в приложение
// @App.php
namespace Roast\Console;

use Roast\Console\Colors;

class ControllersConsole
{
    public $return;
    public $InvalidChar;
    public function __construct()
    {
        $this->return = new Colors();
        $this->InvalidChar  = ["/", "|", ",", ".", ")", "(", "_", "*", "?", ">", "<", ")", "&", "^", "%", "+", "#", "!", "\\", ";", ":", "-", " "];
    }

    public function Make($arg)
    {
        if (str_contains($arg, '\\') || str_contains($arg, '/')) {
            $arg = str_replace(['\\', '/'], '\\', $arg);
            $exparg = explode('\\', $arg);
            $structure = preg_replace('/(.)\1+/', '$1', str_replace($exparg[count($exparg) - 1], '', $arg));
            if(substr($structure, -1) == '\\') $structure = substr_replace($structure,'',-1);
            $controllername = $exparg[count($exparg) - 1];
            if($this->strposa($controllername))
            {
                print $this->return->getColoredString("Failed to create controller $controllername. The controller name cannot contain special chars!" . PHP_EOL, "red");
                exit(1);
            }
            $dir = "controllers\\$structure\\";
            $controller_content = "<?php\nnamespace Roast\Controllers\\$structure;\nuse Roast\App;\nuse Roast\Controller;\nuse Roast\Response;\n\nclass $controllername extends Controller\n{\n\n\n}";
            if (!is_dir($dir)) {
                if (!mkdir($dir, 0775, true)) {
                    $this->return->getColoredString("Failed to create namespace $structure" . PHP_EOL, "red");
                    exit(1);
                }
            } else {
                print $this->return->getColoredString("Namespace $structure already exists. OK." . PHP_EOL, "green");
            }
            if (file_exists($dir . $controllername)) {
                $this->return->getColoredString("Failed to create controller $controllername. Already exists!" . PHP_EOL, "red");
                exit(1);
            } else {
                file_put_contents($dir . $controllername . ".php", $controller_content);
                print $this->return->getColoredString("Controller $controllername created successfully!" . PHP_EOL, "green");
                exit(0);
            }
        }
        else
        {
            $controllername = $arg;
            if($this->strposa($controllername))
            {
                print $this->return->getColoredString("Failed to create controller $controllername. The controller name cannot contain special chars!" . PHP_EOL, "red");
                exit(1);
            }
            $controller_content = "<?php\nnamespace Roast\Controllers;\nuse Roast\App;\nuse Roast\Controller;\nuse Roast\Response;\n\nclass $controllername extends Controller\n{\n\n\n}";
            if (file_exists($controllername)) {
                print $this->return->getColoredString("Failed to create controller $controllername. Already exists!" . PHP_EOL, "red");
                exit(1);
            } else {
                file_put_contents("controllers\\".$controllername . ".php", $controller_content);
                print $this->return->getColoredString("Controller $controllername created successfully!" . PHP_EOL, "green");
                exit(0);
            }
        }
    }

    private function strposa($haystack) {
        $chr = array();
        foreach($this->InvalidChar as $needle) {
            $res = strpos($haystack, $needle);
            if ($res !== false) $chr[$needle] = $res;
        }
        if(empty($chr)) return false;
        return min($chr);
    }

}