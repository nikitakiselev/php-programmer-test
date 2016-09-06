<?php

/**
 * Define app root dir.
 */
define('APP_DIR', __DIR__.'/..');

/*
 * Require composer
 */
require APP_DIR.'/vendor/autoload.php';

/*
 * Get app configuration
 */
$configArray = require APP_DIR.'/config/app.php';
$config = new \App\Support\ConfigRepository($configArray);

return $config;
