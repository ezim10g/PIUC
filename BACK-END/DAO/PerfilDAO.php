<?php

 class PerfilDAO{

    public $dbConn;
    function __construct(){
        $dbConn = new BDD();
    }
    function setPerfil($idUsuario){
        $this->dbConn = new BDD();
        $sql = "INSERT INTO perfil(idUsuario, idTipoPerfil, fotoPerfil, NewsLetter) VALUES (:idUsuario, 3, 'profile.jpg', true)";
        $stmt = $this->dbConn->PrepareSQL($sql);
        $stmt-> bindParam(':idUsuario', $idUsuario,PDO::PARAM_INT);
        $stmt->execute();
        $this->dbConn->CloseConn();
    }

    function setFotoPerfil($fotoPerfil, $id){
        $this->dbConn = new BDD();
        $sql = "UPDATE perfil SET fotoPerfil = :fotoPerfil WHERE idUsuario = :id";
        $stmt = $this->dbConn->PrepareSQL($sql);
        $stmt-> bindParam(':fotoPerfil', $fotoPerfil,PDO::PARAM_STR);
        $stmt-> bindParam(':id', $id,PDO::PARAM_INT);
        $stmt-> execute();
        $this->dbConn->CloseConn();
        
    }


 }


