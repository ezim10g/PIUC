<?php
class TokenDAO{

    function setToken($idToken, $idUsuario, $token, $tempoSessao, $createdAt){
        $sql = "INSERT INTO token (idtoken, idUsuario, token, tempoSessao, createdAt) VALUES (:idtoken, :idUsuario, :token, :tempoSessao, :createdAt)";
        $stmt = PrepareSQL($sql);
        $stmt-> bindParam(':idToken', $idToken, PDO::PARAM_INT); 
        $stmt-> bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT); 
        $stmt-> bindParam(':token', $token, PDO::PARAM_STR); 
        $stmt-> bindParam(':tempoSessao', $tempoSessao, PDO::PARAM_STR); 
        $stmt-> bindParam(':createdAt', $createdAt, PDO::PARAM_STR); 
        $stmt-> execute();
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
        $stmt-> bindParam(':idToken', $idToken, PDO::PARAM_STR);
        $stmt-> execute();
    }

    function verifyToken($idToken){
        $sql = "SELECT token FROM token WHERE idToken = :idToken";
        $stmt = PrepareSQL($sql);
        $stmt-> bindParam(':token', $token, PDO::PARAM_STR);
        $stmt-> execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if(count($result) == 0){
            return true;
        }
        return false;
    }
}