<?php


namespace brofit;


use http\Exception;

class Router
{
    private static $routes = [];
    private static $curRoute = [];

    public static function add($regExp, $route = []){
        self::$routes[$regExp] = $route;
    }

    public static function redirection($url){
        $url = self::removeGetParam($url);
        if(self::matchRoute($url)){
           $controller = 'app\controllers\\' . self::$curRoute['controller']."Controller";
           if(class_exists($controller)){
                $controllerObj = new $controller(self::$curRoute);
                $action = lcfirst(self::uCamelCase(self::$curRoute['action'])) . 'Act';
                if(method_exists($controllerObj,$action)){
                    $controllerObj->$action();
                }else{
                    throw new \Exception("Нет экшона $controller::$action", 404);
                }
           }else{
               throw new \Exception("Нет контроллера $controller", 404);
           }
        }else{
            throw new \Exception("Плохой маршрут $url", 404);
        }
    }

    public static function matchRoute($url){
        foreach (self::$routes as $pattern => $route){
            if(preg_match("#{$pattern}#",$url,$matches)){
                foreach ($matches as $k => $v){
                    if(is_string($k)){
                        $routeTmp[$k] = $v;
                    }
                }
                $routeTmp['controller'] = self::uCamelCase($routeTmp['controller']); // нужно, чтобы вызывать файл из controllers
                self::$curRoute = $routeTmp;
                return true;
            }
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
                return rtrim($params[0],'/');
            }else{
                return '';
            }
        }
    }
    // TODO удалить
    public static  function getRoutes(){
        return self::$routes;
    }

    public static function getCurRoute(){
        return self::$curRoute;
    }

}