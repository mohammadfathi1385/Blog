<?php
require_once(__DIR__.DIRECTORY_SEPARATOR."router.php");

use system\router;

$route = new router();

$route->run();

