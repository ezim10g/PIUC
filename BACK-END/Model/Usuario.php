<?php
include '../util/validateData.php';
class Usuario{

    function ValidarNome($nome){
        ValidateData($nome);
        if(strlen($usuario) > 25){
            return true;
        }else{
            return false;
        }
    }

    function ValidarEmail($email){
        ValidateData($email);
        $regex = "/^\w+([\.-]?\w+)*@\w+([\.-]?w+)*(\.\w{2,3})+$/";
        if(preg_match($regex, $email) == 1){
            return true;
        }else{
            return false;
        }
    }

    function CodificarSenha($senha){
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        return $senha;
    }

    function VerificarSenha($senha, $senhaHash){
        if(password_verify($senha, $senhaHash)){
            return true;
        }else{
            return false;
        }
    }

    function RegistrarUsuario($nome,$email,$senha){

    }

    function LogarUsuario($email,$senha){
        
    }
}