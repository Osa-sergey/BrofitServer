<?php


namespace app\models;


use R;

class HelpsModel
{
    public function getAllHelps(){
        header("Content-Type: application/json");
        $sql = "SELECT id, title, text_help FROM helps";
        $helps = R::getAll($sql);
        return json_encode($helps,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }
}