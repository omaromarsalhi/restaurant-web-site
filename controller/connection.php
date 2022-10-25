<?php
$servername='localhost';
$username='root';
$password='';
$dbname='2A13';
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
    echo "ali";
}
catch( PDOException $e){
echo "not good".$e->getMessage();
}

?>