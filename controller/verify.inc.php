<?php
require "../controller/users_DBC.inc.php";
require "../model/users_DB.inc.php";
session_start();
// sign in verification
if(isset($_POST['signIn'])){
    $singIn=new Users_DBC;
    $holdIn=$singIn->searcAndRetriveUser($_POST['email'],$_POST['password']);
    if(isset($holdIn)){
        $user=new Users($holdIn['id'],$holdIn['firstName'],$holdIn['lastName'],$holdIn['email'],$holdIn['dob'],$holdIn['password'],$holdIn['phNumber'],$holdIn['address'],$holdIn['photo']);
        $_SESSION['user'] = $user;
        header( 'Location: ../view/admin_PHP/admin_profile.php');
    }
}
//sign up verification
if(isset($_POST['signUp'])){
    $user=new Users("",$_POST['firstName'],$_POST['lastName'],$_POST['email'],"",$_POST['password'],"","","");
    $usersToAdd=new Users_DBC;
    $usersToAdd->addUser($user);
    $holdIn=$usersToAdd->searcAndRetriveUser($_POST['email'],$_POST['password']);
    $user2=new Users($holdIn['id'],$holdIn['firstName'],$holdIn['lastName'],$holdIn['email'],$holdIn['dob'],$holdIn['password'],$holdIn['phNumber'],$holdIn['address'],$holdIn['photo']);
    $_SESSION['user'] = $user2;
    header( 'Location: ../view/admin_PHP/admin_profile.php' );
}
// // uploading and verifying profile image
if (isset($_POST['Upload'])){
    $user = $_SESSION['user'];
    $photoToAdd=new Users_DBC;
    $arg=file_get_contents($_FILES['upload']["tmp_name"]);
    $holdIn=$photoToAdd->insertImage($user->getId(),$arg);
    $user2=new Users($holdIn['id'],$holdIn['firstName'],$holdIn['lastName'],$holdIn['email'],$holdIn['dob'],$holdIn['password'],$holdIn['phNumber'],$holdIn['address'],$holdIn['photo']);
    $_SESSION['user'] = $user2;
    header( 'Location: ../view/admin_PHP/admin_profile.php' );
}
else{
    header( 'Location: ../view/admin_PHP/admin_profile.php' );
}