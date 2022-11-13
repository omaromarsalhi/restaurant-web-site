<?php
require "../controller/menu_DBC.inc.php";
require "../model/menu_DB.inc.php";
session_start();

if(isset($_POST['createNewMenu'])){
    $plat=new Menu_db("","","");
    $holdIn=new Menu_DBC;
    $holdIn->addMenu($plat);
    // $holdIn->asearchRetriveMenu($plat->getnomPlat());
    // $plat2=new Menu_db($holdIn['id'],$holdIn['nomPlat'],$holdIn['prixPlat']);
    // $_SESSION['plat'] = $plat2;
    header( 'Location: ../view/html/pagesAdmin/menuManagement.php');
}
if(isset($_POST['saveChanges'])){
        $newPlat=new Menu_db($_SESSION['idPlat'],$_POST['nomPlat'],$_POST['prixPlat']);
        $holdIn=new Menu_DBC;
        $holdIn->updateMenu($newPlat);
    // $holdIn->asearchRetriveMenu($plat->getnomPlat());
    // $plat2=new Menu_db($holdIn['id'],$holdIn['nomPlat'],$holdIn['prixPlat']);
    // $_SESSION['plat'] = $plat2;
        header( 'Location: ../view/html/pagesAdmin/menuManagement.php');
}


if (isset($_GET['id1'])) {

    require '../view/html/pagesAdmin/menuUpdate.html';
    if(isset($_POST['save'])){
        $plat2 = new Menu_db($_GET['id1'],$_POST['nom'],$_POST['prix']);
        $menuToShow->updateMenu($plat2);
        header("Location: ../view/html/pagesAdmin/menuManagement.php");
    }

}


if (isset($_GET['id2'])) {
	$usersToShow = new Menu_DBC;
	$usersToShow->deletMenu($_GET['id2']);
	header("Location: ../view/html/pagesAdmin/menuManagement.php");
}