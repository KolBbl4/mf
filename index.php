<?php
define('BASE_DIR',  getcwd());
require './frm/core/bootstrap.php';
$app = new HowdyEngine(require('settings.php'));
$settings = require('settings.php');

print_r($app->app);