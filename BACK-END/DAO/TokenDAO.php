<?php
class TokenDAO{

    function setToken($idToken, $idUsuario, $token, $tempoSessao, $createdAt){
        try{
            $sql = "INSERT INTO token (idtoken, idUsuario, token, tempoSessao, createdAt) VALUES (:idtoken, :idUsuario, :token, :tempoSessao, :createdAt)";
            $stmt = PrepareSQL($sql);
            $stmt-> bindParam(':idToken', $idToken, PDO::PARAM_INT); 
            $stmt-> bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT); 
            $stmt-> bindParam(':token', $token, PDO::PARAM_STR); 
            $stmt-> bindParam(':tempoSessao', $tempoSessao); 
            $stmt-> bindParam(':createdAt', $createdAt); 
            $stmt-> execute();  
        }catch(PDOException $erro){
            echo "erro : " . $erro->getMessage();
            $conn = null;
        }
        
    }

    function getToken($token){
        $sql = "SELECT * FROM WHERE token = :token";
        $stmt = PrepareSQL($sql);
        $stmt-> bindParam(':token', $token, PDO::PARAM_STR);
        $stmt-> execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function deleteToken($idToken){
        $sql = "DELETE FROM token WHERE idToken = :idToken";
        $stmt = PrepareSQL($sql);
        $stmt-> bindParam(':idToken', $idToken, PDO::PARAM_INT);
        $stmt-> execute();
    }

    function getIdToken($idToken){
        $sql = "SELECT token FROM token WHERE idToken = :idToken";
        $stmt = PrepareSQL($sql);
        $stmt-> bindParam(':idToken', $idToken, PDO::PARAM_INT);
        $stmt-> execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


    function getTempoSesssao($token){
        $sql = "SELECT tempoSessao FROM token WHERE token = :token";
        $stmt = PrepareSQL($sql);
        $stmt-> bindParam(':token', $token, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;

    }
}