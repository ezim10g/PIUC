<?php
$hostName = "localhost";
$username = "root";
$password = "";
$database = "piuc";
$port = "3306";

$conn = mysqli_connect($hostName, $username,$password,$database,$port);

if(!$conn){
    header("location: ../FRONT-END/index.php?dberror=erro na conexão com o banco de dados");
    exit();
}