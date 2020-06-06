<?php


namespace app\controllers;


use brofit\base\Controller;
use brofit\Cache;
use brofit\libs\Utils;
use Exception;
use RedBeanPHP\R;

class NewsController extends AppController
{

    public function getAllNewsAct(){
        $this->dropExceptionIfExistParams();
        $cache = Cache::getInstance();
        $news = $cache->get('news');
        if($news != false){
            return $news;
        }
        $news = $this->getModel()->getAllNews();
        $cache->set('news',$news);
        echo $news;
    }

    public function getNewsAfterDateAct(){
        if(!empty($this->route['getParams'])){
            $params = explode('&',$this->route['getParams']);
            if(count($params) == 1){
                $params[0] = substr($params[0],5);
                echo $this->getModel()->getNewsAfterDate($params);
                return;
            }
            $this->dropExceptionIfMoreParams();
        }
       $this->dropExceptionIfNotExistParams();
    }
}

