<?php
session_start();
include "../Model/Usuario.php";

function LogarController($email,$senha){

    $usuario = new Usuario();

    if($usuario->LogarUsuario($email,$senha)){

        $result = $usuario->getInfoPerfil();
        $_SESSION['nome'] = $result['nome'];
        $_SESSION['id'] = $result['idUsuario'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['fotoPerfil'] = $result['fotoPerfil'];
        $_SESSION['newsLetter'] = $result['newsLetter'];
        $_SESSION['tipoPerfil'] = $result['tipoPerfil'];

        $token = bin2hex(random_bytes(32));
        $_SESSION['token'] = $token;
        header("location: ../../FRONT-END/index.php?message=Login feito com sucesso!");
        exit();   
    }else{
        header("location: ../../FRONT-END/index.php?loginerror=algum problema com os dados!");
        exit(); 
    }
}

if(isset($_POST['email']) && isset($_POST['senha'])){
    LogarController($_POST['email'],$_POST['senha']);
}else{
    header("location: ../../FRONT-END/index.php?loginerror=insira os dados corretamente!");
    exit();
}

