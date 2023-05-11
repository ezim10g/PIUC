<?php
session_start();
include "../Model/Usuario.php";
if(isset($_POST['email']) && isset($_POST['senha'])){

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $usuario = new Usuario();

    if($usuario->LogarUsuario($email,$senha)){

        $_SESSION['idUsuario'] = $usuario->id;
        $_SESSION['nomeUsuario'] = $usuario->nome;
        $_SESSION['emailUsuario'] = $usuario->email;
        $token = bin2hex(random_bytes(32));
        $_SESSION['token'] = $token;
        header("location: ../../FRONT-END/index.php?message=Login feito com sucesso!");
        exit();   
    }else{
        header("location: ../../FRONT-END/index.php?loginerror=algum problema com os dados!");
        exit(); 
    }
}else{
    header("location: ../../FRONT-END/index.php?loginerror=insira os dados corretamente!");
    exit();
}