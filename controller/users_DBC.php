<?php
if(isset($_POST['subb'])){
    require 'connection.php';
    $query = $pdo ->prepare(
        'INSERT INTO users_db(firstName,lastName,email,dateOfBirth,pasword,phNumber)
        VALUES (:firstName,:lastName,:email,:dateOfBirth,:pasword,:phNumber)'
    );
    $query->execute([
        'firstName'=>$_POST['firstName'],
        'lastName'=>$_POST['lastName'],
        'email'=>$_POST['email'],
        'dateOfBirth'=>$_POST['dateOfBirth'],
        'pasword'=>$_POST['password'],
        'phNumber'=>$_POST['phNumber']
    ]);
    $select = "SELECT * FROM users_db";
    $result = $conn->query($select);
    echo $select;
}
?>