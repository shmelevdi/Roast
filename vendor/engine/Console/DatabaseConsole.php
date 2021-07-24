<?php
namespace Roast\Console;

use Roast\Database;
use Roast\Environment;

class DatabaseConsole
{
    public $return;
    public $env;
    public $db;
    public function __construct()
    {
        chdir("public");
        $this->return = new Colors();
        $this->env = new Environment();
        $this->db = new Database();
    }

    public function Test()
    {
        if($this->db->testConnection() == 1) print $this->return->getColoredString("Database connection is OK!" . PHP_EOL, "yellow");
        else print $this->return->getColoredString("Database connection is FAILURE!" . PHP_EOL, "red");
    }

}