<?php


namespace brofit;


use brofit\libs\Utils;
use Exception;

class Router
{
    private static $route;
    private static $curRoute = [];

    public static function add($regExp){
        self::$route = $regExp;
    }

    public static function redirection($url){
        $url = self::removeGetParam($url);
        if(self::matchRoute($url)){
            $controller = 'app\controllers\\' . self::$curRoute['controller']."Controller";
            if(class_exists($controller)){
                $controllerObj = new $controller(self::$curRoute);
                $action = lcfirst(self::$curRoute['action']) . 'Act';
                if(method_exists($controllerObj,$action)){
                    $controllerObj->$action();
                }else{
                    throw new Exception("Нет action $controller::$action", 404);
                }
            }else{
                throw new Exception("Нет контроллера $controller", 404);
            }
        }else{
            throw new Exception("Плохой маршрут $url", 418);
        }
    }

    public static function matchRoute($url){
        $pattern = self::$route;
        if(preg_match("#{$pattern}#",$url,$matches)){
            self::$curRoute['controller'] = self::uCamelCase($matches['controller']); // нужно, чтобы вызывать файл из controllers
            self::$curRoute['action'] = self::uCamelCase($matches['action']);
            return true;
        }
        return false;
    }
    private static function uCamelCase($str){
        return str_replace(' ','',ucwords(str_replace('-',' ',$str)));
    }

    private static function removeGetParam($url){
        if($url){

            $params = explode('&',$url,2);
            if (false === strpos($params[0],'=')){
                if(!empty($params[1])) self::$curRoute['getParams'] = $params[1];
                return rtrim($params[0],'/');
            }else{
                return '';
            }
        }
    }

}