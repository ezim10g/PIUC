<?php
require_once (__DIR__ . "/../DAO/TokenDAO.php");
class Token{

    private $idUsuario;
    public $token;
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
        $this->createdAt = date("Y-m-d");
        $periodo = strtotime('+7 day');
        $this->tempoSessao = date("Y-m-d", $periodo); ;
        $this->tokenDAO->setToken($this->idToken,$this->idUsuario,$this->token,$this->tempoSessao, $this->createdAt);
    }

    function getToken(){
        return $this->token;
    }
    function autenticateToken($token){
        $result[] = $this->tokenDAO->getTokenById($this->idUsuario,$token);
        if(empty($result) == 1){
            return true;
        }
        return false;
    }
}