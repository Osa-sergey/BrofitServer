<?php


namespace app\models;


use R;
use RedBeanPHP\RedException;

class HelpsModel extends AppModel
{
    public function getAllHelps(){
        $sql = "SELECT id, title, text_help FROM helps";
        header("Content-Type: application/json");
        try{
            $helps = R::getAll($sql);
        } catch (RedException\SQL $exception){}
        return json_encode($helps,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }
}