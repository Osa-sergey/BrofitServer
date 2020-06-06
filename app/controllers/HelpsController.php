<?php


namespace app\controllers;


use brofit\Cache;

class HelpsController extends AppController
{
    public function getAllHelpsAct(){
        $this->dropExceptionIfExistParams();
        $cache = Cache::getInstance();
        $helps = $cache->get('helps');
        if($helps != false){
            return $helps;
        }
        $helps = $this->getModel()->getAllHelps();
        $cache->set('helps',$helps);
        echo $helps;
    }
}