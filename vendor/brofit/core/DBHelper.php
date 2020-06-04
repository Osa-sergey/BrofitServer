<?php


namespace brofit;


use mysql_xdevapi\Exception;
use RedBeanPHP\R;

class DBHelper
{
    use TraitSingleton;

    private function __construct()
    {
        $dbCon = require_once CONF.'/conf_db.php';
        class_alias('\RedBeanPHP\R','\R');
        R::setup($dbCon['dsn'],$dbCon['user'],$dbCon['password']);
        if(!R::testConnection()){
            throw new Exception("Нет соединения с БД",503);
        }
        R::freeze(true);
        if(DEBUG)
            R::debug(true);
    }
}