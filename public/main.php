<?php
require_once __DIR__ . "/../vendor/autoload.php";

use App\controllers\HomeController;
use App\core\Router;

$inst = new Router();
echo $inst->disparcher();