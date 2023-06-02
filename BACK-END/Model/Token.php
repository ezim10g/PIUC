<?php
require_once ( dirname(__FILE__) . "../../DAO/TokenDAO.php");
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
        print_r($result);
        if(!empty($result[0])){
       //   if(count($result[0] != 0)){
            $tempoSessao = $result[0]['tempoSessao'];
            if(strtotime($tempoSessao) > strtotime(date("Y-m-d"))){
                return true;
            }else{
                $this->tokenDAO->deleteToken($this->idUsuario);
            }
        }
        return false;
    }

    function verifyIfIsToken(){
        $result = $this->tokenDAO->getToken($this->idUsuario);
        if(empty($result)){
            return true;
        }
        return false;
    }

    function deleteToken(){
        $this->tokenDAO->deleteToken($this->idUsuario);
    }
}