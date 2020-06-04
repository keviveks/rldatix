#!/usr/bin/env php
<?php

namespace RLDatix;

require_once __DIR__.'/vendor/autoload.php';

require __DIR__.'/config.php';
require __DIR__.'/lib/Logger.php';
require __DIR__.'/lib/Remote.php';
require __DIR__.'/application.php';

// uncaught exception handler
set_exception_handler('exceptionHandler');
function exceptionHandler($e)
{
    Logger::log('Exception: '.$e->getMessage(), 'ERROR');
}
