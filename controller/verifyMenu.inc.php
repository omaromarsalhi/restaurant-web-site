<?php
require "../controller/menu_DBC.inc.php";
require "../model/menu_DB.inc.php";
session_start();

if(isset($_POST['createNewMenu'])){
    $plat=new Menu_db("","","");
    $holdIn=new Menu_DBC;
    $holdIn->addMenu($plat);
    header( 'Location: ../view/html/pagesAdmin/menuManagement.php');
}
if(isset($_POST['saveChanges'])){
        $newPlat=new Menu_db($_SESSION['idPlat'],$_POST['nomPlat'],$_POST['prixPlat']);
        $holdIn=new Menu_DBC;
        $holdIn->updateMenu($newPlat);
        header( 'Location: ../view/html/pagesAdmin/menuManagement.php');
}


if (isset($_GET['id2'])) {
	$usersToShow = new Menu_DBC;
	$usersToShow->deletMenu($_GET['id2']);
	header("Location: ../view/html/pagesAdmin/menuManagement.php");
}