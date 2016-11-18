<?php
define('BASE_DIR',  getcwd());
define('FRM_DIR',  getcwd().'/frm');
require './frm/start.php';
$app = new HowdyEngine(require('settings.php'));
$settings = require('settings.php');
