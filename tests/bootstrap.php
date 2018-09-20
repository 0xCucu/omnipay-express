<?php

error_reporting(E_ALL | E_STRICT);

// include the composer autoloader
$autoloader = require __DIR__ . '/../vendor/autoload.php';

// autoload abstract TestCase classes in test directory
$autoloader->add('Omnipay', __DIR__);

$configFile = realpath(__DIR__ . '/../config.php');

if (file_exists($configFile)) {
    include_once $configFile;
} else {
    define('ALIPAY_PARTNER', '208801111111111111');
    define('ALIPAY_KEY', '1111');
}

if (! function_exists('dd')) {
    function dd()
    {
        foreach (func_get_args() as $arg) {
            var_dump($arg);
        }
        exit(0);
    }
}
