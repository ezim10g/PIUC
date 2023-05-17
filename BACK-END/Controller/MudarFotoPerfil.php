<?php
session_start();
include "../Model/Usuario.php";

if(isset($_POST['foto'])){
    $usuario = new Usuario();
    $usuario->setFotoPerfil($_POST['foto'],$_SESSION['id']);
    header("location: ../../FRONT-END/index.php");
    exit();
}else{
    header("location: ../../FRONT-END/index.php");
    exit();
}