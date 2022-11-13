<?php
class config{
    public static function getConnection(){
            $db = mysqli_connect('localhost', 'root', '', 'webproject');
            if(!$db){
                die("Error on the connection" .mysqli_error());
                }
                return $db;
    }
}