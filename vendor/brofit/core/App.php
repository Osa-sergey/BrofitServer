<?php


namespace brofit;


class App
{
    public static $app;

    public function __construct()
    {
        $query = trim($_SERVER['REQUEST_URI'], '/');
        session_start();
        self::$app = Registry::getInstance();
    }


}