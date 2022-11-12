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
// if (isset($_POST['Upload'])){
//     $user = $_SESSION['user'];
//     $photoToAdd=new Users_DBC;
//     $arg=file_get_contents($_FILES['upload']["name"]);
//     $holdIn=$photoToAdd->insertImage($user->getId(),$arg);
//     $user2=new Users($holdIn['id'],$holdIn['firstName'],$holdIn['lastName'],$holdIn['email'],$holdIn['dob'],$holdIn['password'],$holdIn['phNumber'],$holdIn['address'],$holdIn['photo']);
//     $_SESSION['user'] = $user2;
//     header( 'Location: ../view/admin_PHP/admin_profile.php' );
// }
// else{
//     header( 'Location: ../view/admin_PHP/admin_profile.php' );
// }



if (isset($_POST['Upload']) && isset($_FILES['upload'])) {
	$img_name = $_FILES['upload']['name'];
	$img_size = $_FILES['upload']['size'];
	$tmp_name = $_FILES['upload']['tmp_name'];
	$error = $_FILES['upload']['error'];

	if ($error === 0) {
		if ($img_size > 125000) {
			$em = "Sorry, your file is too large.";
		    header("Location: ../view/admin_PHP/admin_profile.php?error=$em");
		}
        else{
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);
			$allowed_exs = array("jpg", "jpeg", "png");
			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
                $user = $_SESSION['user'];
                $photoToAdd=new Users_DBC;
                $photoToAdd->insertImage($user->getId(),$new_img_name);

                $holdIn=$photoToAdd->searcAndRetriveUser($user->getEmail(),$user->getPassword());
                $user2=new Users($holdIn['id'],$holdIn['firstName'],$holdIn['lastName'],$holdIn['email'],$holdIn['dob'],$holdIn['password'],$holdIn['phNumber'],$holdIn['address'],$holdIn['photo']);
                $_SESSION['user'] = $user2;
                header( 'Location: ../view/admin_PHP/admin_profile.php' );
			}
            else {
				$em = "You can't upload files of this type";
		        header("Location: ../view/admin_PHP/admin_profile.php?error=$em");
			}
		}
	}
    else {
		$em = "unknown error occurred!";
		header("Location: ../view/admin_PHP/admin_profile.php?error=$em");
	}
}