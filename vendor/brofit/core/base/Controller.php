<?php


namespace brofit\base;


class Controller
{
    public $route;

    public function __construct($route)
    {
        $this -> route = $route;
    }
}