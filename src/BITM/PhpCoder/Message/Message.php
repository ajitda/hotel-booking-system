<?php
namespace App\BITM\PhpCoder\Message;
if(!isset($_SESSION['message']) )session_start();

class Message{
    public static function message($message=NULL)
    {
        if (is_null($message)) {
            $_message = self::getMessage();
            return $_message;
        } else {
            self::setMessage($message);
        }
    }

    public static function setMessage($message){
           $_SESSION['message']=$message;
            //return $_message;

        }
    public static function getMessage(){
            $_message= $_SESSION['message'];
            $_SESSION['message']="";
            return $_message;

        }





}