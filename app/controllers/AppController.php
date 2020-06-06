<?php


namespace app\controllers;


use brofit\base\Controller;
use brofit\base\Model;
use Exception;

class AppController extends Controller
{
    public $model;

    public function __construct($route)
    {
        parent::__construct($route);
        new Model();
        $modelName = 'app\models\\' . $this->route['controller']."Model";
        $this->model = new $modelName();
    }

    public function dropExceptionIfExistParams(){
        if(!empty($this->route['getParams'])){
            header("Content-Type: text/html; charset=utf-8");
            throw new Exception("Наличие параметров:".$this->route['getParams']." в запросе к action:". $this->route['action'],422);
        }
    }

    public function dropExceptionIfNotExistParams(){
        header("Content-Type: text/html; charset=utf-8");
        throw new Exception("Нет параметров в action: ".$this->route['action'], 422);
    }

    public function dropExceptionIfMoreParams(){
        header("Content-Type: text/html; charset=utf-8");
        throw new Exception("Превышение количества параметров в action: ".$this->route['action']." Параметры: ".$this->route['getParams'], 422);
    }
}