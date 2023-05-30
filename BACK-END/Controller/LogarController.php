<?php
include "../Model/Usuario.php";
include "../Model/Token.php";
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
    $tokenObj = new Token($result['idUsuario']);
    $tokenObj->setToken();
    $_SESSION['token'] = $tokenObj->getToken();
}else{
CaptureErro("loginerror",$usuario->erroMessage);

}
}