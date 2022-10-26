<?php
require '../controller/connection.php';
class Users_DB{
    public $firstName;
    public $lastName;
    public $email;
    public $dateOfBirth;
    public $password;
    public $phNumber;


    function retrive_users_db()
    {
    $sql="SElECT * From users_db";
    try{
    $db =config::setConnection();
    $liste=$db->query($sql);
    return $liste;
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}
}
?>