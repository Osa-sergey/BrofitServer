<?php


namespace brofit;


class ErrorHandler
{
    public function __construct()
    {
        if(DEBUG){
            error_reporting(-1);
        }else{
            error_reporting(0);
        }
        set_exception_handler([$this, 'exceptionHandler']);
    }
    public function exceptionHandler($e){
        $this -> logErrors($e->getMessage(), $e->getFile(),$e->getLine());
        $this -> sendErrors($e->getCode());
    }
    private function logErrors($message = '', $file = '', $line = ''){
        error_log("[" . date('Y-m-d H:i:s') . "] Сообщение: ".
        $message. " | Файл: ". $file . " | Строка: ". $line . "\n __________________ \n", 3,
        ROOT . '/tmp/errors.log');
    }

    private function sendErrors($response){
        http_response_code($response);
    }
}