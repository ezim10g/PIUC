<?php
$hostName = "localhost";
$username = "root";
$password = "";
$database = "piuc";
$port = "3306";


try{
    $conn = new PDO("mysql:host=" . $hostName ."; dbname=" . $database ,  $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "funcionou";
}catch(PDOException $erro){
    echo "erro ao conectar ao banco de dados: " . e->$getMessage();
    $conn = null;
}

