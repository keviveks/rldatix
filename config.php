<?php

ini_set('log_errors', 1);
ini_set('display_errors', 1);
ini_set('error_log', __DIR__.'/log/error.log');

// define the path
defined('APP_LOG_FILE') ? null : define('APP_LOG_FILE', __DIR__.'/log/app.log');

// load the environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
