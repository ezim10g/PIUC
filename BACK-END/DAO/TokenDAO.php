<?php
class TokenDAO{


    public $dbConn;
    function __construct(){
        $dbConn = new BDD();
    }
    function setToken($idToken, $idUsuario, $token, $tempoSessao, $createdAt){
        $this->dbConn = new BDD();
        echo $idToken."<br>". $idUsuario."<br>". $token."<br>". $tempoSessao."<br>". $createdAt;
        try{
            $sql = "INSERT INTO token (idToken, idUsuario, token, tempoSessao, createdAt) VALUES (:idToken, :idUsuario, :token, :tempoSessao, :createdAt)";
            $stmt = $this->dbConn->PrepareSQL($sql);
            $stmt-> bindParam(':idToken', $idToken); 
            $stmt-> bindParam(':idUsuario', $idUsuario); 
            $stmt-> bindParam(':token', $token); 
            $stmt-> bindParam(':tempoSessao', $tempoSessao); 
            $stmt-> bindParam(':createdAt', $createdAt); 
            $stmt-> execute();  
            $this->dbConn->CloseConn();
        }catch(PDOException $erro){
            echo "erro setToken bah : " . $erro->getMessage();
            exit();
        }
        
    }

    function getTokenById($id,$token){
        $this->dbConn = new BDD();
        $sql = "SELECT token FROM token WHERE idToken =:idToken AND token = :token ";
        $stmt = $this->dbConn->PrepareSQL($sql);
        $stmt-> bindParam(':idToken', $id, PDO::PARAM_INT);
        $stmt-> bindParam(':token', $token, PDO::PARAM_STR);
        $stmt-> execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->dbConn->CloseConn();
        return $result;
    }

    function deleteToken($idToken){
        $this->dbConn = new BDD();
        $sql = "DELETE FROM token WHERE idToken = :idToken";
        $stmt = $this->dbConn->PrepareSQL($sql);
        $stmt-> bindParam(':idToken', $idToken, PDO::PARAM_INT);
        $stmt-> execute();
        $this->dbConn->CloseConn();
    }

    function getIdToken($idToken){
        $this->dbConn = new BDD();
        $sql = "SELECT token FROM token WHERE idToken = :idToken";
        $stmt = $this->dbConn->PrepareSQL($sql);
        $stmt-> bindParam(':idToken', $idToken, PDO::PARAM_INT);
        $stmt-> execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->dbConn->CloseConn();
        return $result;
    }


    function getTempoSesssao($token){
        $this->dbConn = new BDD();
        $sql = "SELECT tempoSessao FROM token WHERE token = :token";
        $stmt = $this->dbConn->PrepareSQL($sql);
        $stmt-> bindParam(':token', $token, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->dbConn->CloseConn();
        return $result;

    }
}