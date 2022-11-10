<?php
class config{
    public static function getConnection(){
        try{
            $db =new PDO("mysql:host=localhost;dbname=webproject",'root','',
            [
                PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
            );
        }
        catch( PDOException $e){
        echo "Errer".$e->getMessage();
        }
        return $db;
    }
}
?>