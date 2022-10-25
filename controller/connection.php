<?php
$servername='localhost';
$username='root';
$password='';
$dbname='webproject';
try{
    $pdo =new PDO(
        "mysql:host=$servername;dbname=$dbname",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

        ]
        );
        echo "good";
}
catch( PDOException $e){
    echo "Errer".$e->getMessage();
}
?>