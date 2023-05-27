<?php
include "../DAO/db_conn.php";
include '../util/validateData.php';
include '../DAO/UsuarioDAO.php';
include "../DAO/PerfilDAO.php";
include "Token.php";
class Usuario{

    public $id;
    public $nome;
    public $email;
    public $usuarioDAO;
    public $erroMessage;

    function __construct(){
        $this->usuarioDAO = new UsuarioDAO();
    }

    function ValidarNome($nome){
        $nome = Validate($nome);
        if(strlen($nome) < 25 && !empty($nome)){
            $this->$nome = $nome;
            return true;
        }else{
            $this->erroMessage = "Algum problema com o nome inserido!";
            return false;
        }

    }

    function ValidarEmail($email){
        $email = Validate($email);
        $regex = "/^\w+([\.-]?\w+)*@\w+([\.-]?w+)*(\.\w{2,3})+$/";
        if(preg_match($regex, $email) == 1 && !empty($email)){
            $this->$email = $email;
            return true;
        }else{
            $this->erroMessage = "Algum problema com a E-mail inserido!";
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
            $this->erroMessage = "Algum problema com a senha inserida!";
            return false;
        }
    }

    function verifyEmail($email){
        $result = $this->usuarioDAO->getEmail($email);
        if(empty($result)){
            return true;
        }
        $this->erroMessage = "Já existe conta com esse email!";
        return false;
    }
    

    function RegistrarUsuario($nome,$email,$senha){

        
        if($this->ValidarNome($nome) && $this->ValidarEmail($email) && $this->verifyEmail($email) ){
            $senha = $this->CodificarSenha($senha);
            $this->usuarioDAO->setUsuario($nome,$email,$senha);
            $perfil = new PerfilDAO();
            $result = $this->usuarioDAO->getALL($email);
            $id = $result['idUsuario'];
            $perfil->setPerfil($id);
            return true;
        }else{
            return false;
        }
    }

    function LogarUsuario($email,$senha){
        if($this->ValidarEmail($email)){
            $result = $this->usuarioDAO->getALL($email);
            if($this->VerificarSenha($senha,$result['senhaUsuario'])){
                $this->id = $result['idUsuario'];
                $this->nome = $result['nomeUsuario'];
                $this->email = $result['email'];
                $this->id = $result['idUsuario'];
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    function getInfoPerfil(){
        $result = $this->usuarioDAO->getInfo($this->id);
        return $result;

    }

    function setFotoPerfil($fotoPerfil, $id){
        $perfil = new PerfilDAO();
        $perfil->setFotoPerfil($fotoPerfil, $id);
    }

    function getFotoPerfil($id){
        $result = $this->usuarioDAO->getInfo($id);
        return $result;
    }


}

