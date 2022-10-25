<?php
if(isset($_POST['subb'])){
    require 'connection.php';
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $email=$_POST['email'];
    $dateOfBirth=$_POST['dateOfBirth'];
    $password=$_POST['password'];
    $phNumber=$_POST['phNumber'];
    echo "finally";
    $query = $pdo ->prepare(
        'INSERT INTO users_db(firstName,lastName,email,dateOfBirth,password,phNumber)
        VALUES ($firstName,$lastName,$email,$dateOfBirth,$password,$phNumber)'
    );
}
?>