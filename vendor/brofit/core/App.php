<?php


namespace brofit;


class App
{
    public static $app;

    public function __construct()
    {
        $query = trim($_SERVER['QUERY_STRING'], '/');
        session_start();
        self::$app = Registry::getInstance();
        new ErrorHandler();
        Router::redirection($query);
    }


}