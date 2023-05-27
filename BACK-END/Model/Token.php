<?php
include "../DAO/TokenDAO.php";
class Token{

    private $idUsuario;
    private $token;
    private $idToken;
    private $tokenDAO;
    private $createdAt;
    private $tempoSessao;

    function __construct($idUsuario){
        $this->tokenDAO = new TokenDAO();
        $this->idUsuario = $idUsuario;
    }


    private function MakeToken(){
        $token = bin2hex(random_bytes(32)); 
        $this->token = $token;  
    }

    private function verifyToken($idToken){
        $result = $this->tokenDAO->getIdToken($idToken);
        if(empty($result)){
            return true;
        }
        return false;
    }
    private function MakeIdToken(){
        $idToken = mt_rand(1, 5000);
        if($this->verifyToken($idToken)){
            $this->idToken = $idToken;
        }else{
            $this->MakeIdToken();
        }
        
    }

    function setToken(){
        $this->MakeToken();
        $this->MakeIdToken();
        $this->createdAt = date("d/m/Y");
        $periodo = strtotime('+7 day');
        $this->tempoSessao = date("d/m/Y", $periodo); ;
        $this->tokenDAO->setToken($this->idToken,$this->idUsuario,$this->token,$this->tempoSessao, $this->createdAt);
    }

    function verifyCredibilityToken($token){
        
    }

    function autenticateToken($token){
        if(!empty($this->tokenDAO->getToken($token))){
            return true;
        }
        return false;
    }
}