<?php
require '../../../controller/menu_DBC.inc.php';
require '../../../model/menu_DB.inc.php';
session_start();

if (isset($_GET['id1'])) {
        $holdIn=new Menu_DBC;
        $menu=$holdIn->searchRetriveMenu($_GET['id1']);
        $plat= new Menu_db($menu['id'],$menu['nomPlat'],$menu['prixPlat']);
        $_SESSION['idPlat']=$menu['id'];
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Simple registration form</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
        <link
            rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
            integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
            crossorigin="anonymous"
        >
        <style>
      html, body {
      display: flex;
      justify-content: center;
      height: 100%;
      }
      body, div, h1, form, input, p {
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 16px;
      color: #666;
      }
      h1 {
      padding: 10px 0;
      font-size: 42px;
      font-weight: 300;
      text-align: center;
      }
      p {
      font-size: 12px;
      }
      hr {
      color: #a9a9a9;
      opacity: 0.3;
      }
      .main-block {
      max-width: 340px;
      min-height: 460px;
      padding: 10px 0;
      margin: auto;
      border-radius: 5px;
      border: solid 1px #ccc;
      box-shadow: 1px 2px 5px rgba(0,0,0,.31);
      background: #1a1814;
      }
      form {
      margin: 0 30px;
      }
      .account-type, .gender {
      margin: 15px 0;
      }
      label#icon {
      margin: 0;
      border-radius: 5px 0 0 5px;
      }



      input[type=text], input[type=password] {
      width: calc(100% - 57px);
      height: 36px;
      margin: 13px 0 0 -5px;
      padding-left: 10px;
      border-radius: 0 5px 5px 0;
      border: solid 1px #cbc9c9;
      box-shadow: 1px 2px 5px rgba(0,0,0,.09);
      background: #fff;
      }
      input[type=password] {
      margin-bottom: 15px;
      }
      #icon {
      display: inline-block;
      padding: 9.3px 15px;
      box-shadow: 1px 2px 5px rgba(0,0,0,.09);
      background: #da3743;
      color: #fff;
      text-align: center;
      }
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 100%;
      padding: 10px 0;
      margin: 10px auto;
      border-radius: 5px;
      border: none;
      background: #da3743;
      font-size: 14px;
      font-weight: 600;
      color: #fff;
      }
      button:hover {
      background: #da3743;
      }
        </style>
    </head>
    <body>
        <div class="main-block">
            <h1>Registration</h1>
            <form action="../../../controller/verifyMenu.inc.php" method="POST">
                <hr>
                <label id="icon" for="name">
                    <i class="fas fa-envelope"></i>
                </label>
                <input
                    type="text"
                    name="nomPlat"
                    id="name"
                    value='<?php echo $plat->getnomPlat();?>'
                >
                <label id="icon" for="name">
                    <i class="fas fa-user"></i>
                </label>
                <input
                    type="text"
                    name="prixPlat"
                    id="name"
                    value='<?php echo $plat->getprixPlat();?>'
                >
                <hr>
                <div class="btn-block">
                    <button type="submit" name="saveChanges">Save</button>
                </div>
            </form>
        </div>
    </body>
</html>
