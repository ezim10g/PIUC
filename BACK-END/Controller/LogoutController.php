<?php
session_start();

include (__DIR__ .'/../DAO/db_conn.php');
include (__DIR__ ."/../Model/Token.php");

$tokenObj = new Token($_SESSION['id']);
$tokenObj->deleteToken();

session_unset();
header("location: ../../FRONT-END/index.php?aviso=logout");
        exit();
?>