<?php


namespace app\models;

use R;
use RedBeanPHP\RedException;

class NewsModel extends AppModel
{
    public function getAllNews(){
        $sql = "SELECT id, title, text_news FROM news";
        header("Content-Type: application/json");
        try{
            $news = R::getAll($sql);
        } catch (RedException\SQL $exception){}
        return json_encode($news,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }

    public function getNewsAfterDate($params){
        $sql = "SELECT id, title, text_news FROM news WHERE date_created >= ?";
        header("Content-Type: application/json");
        try{
            $news = R::getAll($sql,$params);
        } catch (RedException\SQL $exception){}
        return json_encode($news,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }
}