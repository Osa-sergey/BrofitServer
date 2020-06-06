<?php


namespace brofit;


class Cache
{
    use TraitSingleton;

    public function set($key,$data){
        if(file_put_contents(CACHE.'/'.$key.'.txt',$data)){
            return true;
        }
        return false;
    }

    public function get($key){
        $file = CACHE.'/'.$key.'txt';
        if(file_exists($file)){
            return file_get_contents($file);
        }
        return false;
    }
}