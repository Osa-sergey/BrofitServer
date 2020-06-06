<?php


namespace app\models;


use R;

class NewsModel
{
    public function getAllNews(){
        header("Content-Type: application/json");
        $sql = "SELECT id, title, text_news FROM news";
        $news = R::getAll($sql);
        return json_encode($news,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }

    public function getNewsAfterDate($params){
        header("Content-Type: application/json");
        $sql = "SELECT id, title, text_news FROM news WHERE date_created >= ?";
        $news = R::getAll($sql,$params);
        return json_encode($news,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }
}