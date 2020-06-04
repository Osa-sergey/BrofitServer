<?php

namespace brofit\libs;

class Utils
{
    public static function debug($array){
        echo '<pre>' .print_r( $array,true) . '</pre>';
    }
}

