<?php
define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/root');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/brofit/core');
define("LIBS", ROOT . '/vendor/brofit/core/libs');
define("CACHE", ROOT . '/tmp/cache');
define("CONF", ROOT . '/config');

require_once ROOT . '/vendor/autoload.php';
