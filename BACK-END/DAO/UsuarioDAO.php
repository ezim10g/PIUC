<?php

 
class UsuarioDAO{


    public $dbConn;
    function __construct(){
        
    }

    function setNome($id,$nome){
        $this->dbConn = new BDD();
        $sql = "UPDATE usuario SET nomeUsuario= :nome WHERE idUsuario=:id";
        $stmt = $this->dbConn->PrepareSQL($sql);
        $stmt-> bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt-> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $this->dbConn->CloseConn();
    }

    function setEmail($id,$email){
        $this->dbConn = new BDD();
        $sql = "UPDATE usuario SET emailUsuario= :email WHERE idUsuario=:id";
        $stmt = $this->dbConn->PrepareSQL($sql);
        $stmt-> bindParam(':email', $email, PDO::PARAM_STR);
        $stmt-> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $this->dbConn->CloseConn();
    }

    function setSenha($id,$senha, $conn){
        $this->dbConn = new BDD();
        $sql = "UPDATE usuario SET senhaUsuario= :senha WHERE idUsuario=:id";
        $stmt = $this->dbConn->PrepareSQL($sql);
        $stmt-> bindParam(':senha', $senha, PDO::PARAM_STR);
        $stmt-> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $this->dbConn->CloseConn();
    }

    function DeleteUsuario($id,$conn){
        $this->dbConn = new BDD();
        $sql = "DELETE FROM usuario WHERE idUsuario= :id";
        $stmt = $this->dbConn->PrepareSQL($sql);
        $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt -> execute();
        $this->dbConn->CloseConn();
    }

    function SetUsuario($nome,$email,$senha){
        $this->dbConn = new BDD();
        $sql = "INSERT INTO usuario(nomeUsuario,emailUsuario, senhaUsuario) VALUES(:nome,:email,:senha)";
        $stmt = $this->dbConn->PrepareSQL($sql);
        $stmt-> bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt-> bindParam(':email', $email, PDO::PARAM_STR);
        $stmt-> bindParam(':senha', $senha, PDO::PARAM_STR);
        $stmt-> execute();
        $this->dbConn->CloseConn();
    }

    function getALL($email){
        $this->dbConn = new BDD();
        try{
            $sql = "SELECT * FROM usuario WHERE emailUsuario = :email";
            $stmt = $this->dbConn->PrepareSQL($sql);
            $stmt-> bindParam(':email', $email, PDO::PARAM_STR);
            $stmt-> execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->dbConn->CloseConn();
            return $result;
        }catch(PDOException $erro){
            echo "erro setUSer : " . $erro->getMessage();
            exit();
        }
        
    }

    function getInfo($id){
        $this->dbConn = new BDD();
        $sql = "SELECT * FROM vw_infoUsuario WHERE idUsuario = :id";
        $stmt = $this->dbConn->PrepareSQL($sql);
        $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt -> execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->dbConn->CloseConn();
        return $result;
    }

    function getEmail($email){
        $this->dbConn = new BDD();
        $sql = "Select emailUsuario FROM usuario WHERE  emailUsuario = :email";
        $stmt = $this->dbConn->PrepareSQL($sql);
        $stmt-> bindParam(':email', $email, PDO::PARAM_STR);
        $stmt-> execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->dbConn->CloseConn();
        return $result;
    }

}