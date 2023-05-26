<?php
session_start();
include "./LogarController.php";
include "../util/CaptureErro.php";

if(isset($_POST['usuario']) && isset($_POST['email']) && isset($_POST['senha'])){
    $nome = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $usuario = new Usuario();
    if($usuario->RegistrarUsuario($nome, $email, $senha)){
        LogarController($email, $senha);
        header("location: ../../FRONT-END/index.php?message=USuário registrado com sucesso");
        exit();  
    }else{
        CaptureErro("registererror",$usuario->erroMessage);
    }
}else{
    CaptureErro("registererror","falta de dados");
}
