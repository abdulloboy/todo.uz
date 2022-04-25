<?php

require_once './autoload.php';

use App\Application;

const CONFIG_FILE = 'config/config.php';

// load configuration
$config = require_once CONFIG_FILE;

(new Application($config))->run();
