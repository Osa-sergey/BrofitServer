<?php


namespace brofit;


class App
{

    public function __construct()
    {
        $query = trim($_SERVER['QUERY_STRING'], '/');
        session_start();
        new ErrorHandler();
        Router::redirection($query);
    }


}