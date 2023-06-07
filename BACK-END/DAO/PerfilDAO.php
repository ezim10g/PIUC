<?php

 class PerfilDAO{

    public $dbConn;
    function __construct(){
        $dbConn = new BDD();
    }
    function setPerfil($idUsuario){
        try{
          $this->dbConn = new BDD();
        $sql = "INSERT INTO perfil(idUsuario, idTipoPerfil, fotoPerfil, NewsLetter, temaPerfil) VALUES (:idUsuario, 3, 'profile.jpg', false, 'escuro')";
        $stmt = $this->dbConn->PrepareSQL($sql);
        $stmt-> bindParam(':idUsuario', $idUsuario,PDO::PARAM_INT);
        $stmt->execute();
        $this->dbConn->CloseConn();  
        }catch(PDOException $erro){
            echo "erro setPerfil: " . $erro->getMessage();
            exit();
        }
        
    }

    function setFotoPerfil($fotoPerfil, $id){
        try{
          $this->dbConn = new BDD();
        $sql = "UPDATE perfil SET fotoPerfil = :fotoPerfil WHERE idUsuario = :id";
        $stmt = $this->dbConn->PrepareSQL($sql);
        $stmt-> bindParam(':fotoPerfil', $fotoPerfil,PDO::PARAM_STR);
        $stmt-> bindParam(':id', $id,PDO::PARAM_INT);
        $stmt-> execute();
        $this->dbConn->CloseConn();  
        }catch(PDOException $erro){
            echo "erro setUser: " . $erro->getMessage();
            exit();
        }
        
        
    }

    function deletePerfil($id){
        try{
            $sql = "DELETE FROM usuario WHERE idUsuario = :id";
            $stmt = $this->dbConn->PrepareSQL($sql);
            $stmt-> bindParam(':id',$id);
            $stmt->execute();
            $this->dbConn->CloseConn();
        }catch(PDOException $erro){
            echo "erro deleteUser: " .$erro->getMessage() ;
            exit();
        }
    }


 }


