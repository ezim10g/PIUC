<?php
include '../util/validateData.php';
include '../DAO/UsuarioDAO.php';
class Usuario{

    public $nome;
    public $email;

    function ValidarNome($nome){
        $nome = Validate($nome);
        if(strlen($nome) < 25){
            $this->$nome = $nome;
            return true;
        }else{
            return false;
        }

    }

    function ValidarEmail($email){
        $email = Validate($email);
        $regex = "/^\w+([\.-]?\w+)*@\w+([\.-]?w+)*(\.\w{2,3})+$/";
        if(preg_match($regex, $email) == 1){
            $this->$email = $email;
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
        if($this->ValidarNome($nome) && $this->ValidarEmail($email)){
            $senha = $this->CodificarSenha($senha);
            $usuarioDAO = new UsuarioDAO();
            $usuarioDAO->setUsuario($nome,$email,$senha);
            return true;
        }else{
            return false;
        }
    }

    function LogarUsuario($email,$senha){

    }
}

$user = new Usuario();
$user->RegistrarUsuario('eminhs','sotero@gmail.com','123456');