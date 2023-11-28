<?php 
try{
    $host = "localhost";
    $dbname = "3b_php";
    $user = "root";
    $password = "";

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $err){
    echo $err->getMessage();
}
?>