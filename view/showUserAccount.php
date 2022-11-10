<?php
require "../controller/users_DBC.inc.php";
require "../model/users_DB.inc.php";

//sign in verification
if(isset($_POST['signIn'])){
    $singIn=new Users_DBC;
    $holdIn=$singIn->searcAndRetriveUser($_POST['email'],$_POST['password']);
    if(isset($holdIn)){
        $user=new Users($holdIn['id'],$holdIn['firstName'],$holdIn['lastName'],$holdIn['email'],$holdIn['dob'],$holdIn['password'],$holdIn['phNumber'],$holdIn['address']);
        session_start();
        $_SESSION['user'] = $user;
        header( 'Location: account.php' );
    }
}
//update verification
// if(isset($_POST['Update'])){
//     $singIn=new Users_DBC;
//     echo $passwrod;
//     $holdIn=$singIn->searcAndRetriveUser($email,$passwrod);
//     $updatedUser=new Users($holdIn['id'],$_POST['firstName'],$_POST['lastName'],$_POST['email'],$_POST['dob'],$holdIn['password'],$_POST['phNumber'],$_POST['address']);
//     $sqlC=new Users_DBC;
//     $sqlC->updateUsers($updatedUser);
// }
// if(isset($_POST['signUp'])){
//     $users=new Users($_POST['id'],$_POST['firstName'],$_POST['lastName'],$_POST['email'],$_POST['dob'],$_POST['password'],$_POST['phNumber'],$_POST['address']);
//     $usersToAdd=new Users_DBC;
//     $usersToAdd->addUsers($users);
// }
?>