<?php


namespace brofit;


trait TraitSingleton
{
    private static $instance;
    public static function getInstance() {
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }
}