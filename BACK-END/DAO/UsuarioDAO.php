<?php

 
class UsuarioDAO{


    public $dbConn;
    function __construct(){
        
    }

    function setNome($id,$nome){
        try{
         $this->dbConn = new BDD();
        $sql = "UPDATE usuario SET nomeUsuario= :nome WHERE idUsuario=:id";
        $stmt = $this->dbConn->PrepareSQL($sql);
        $stmt-> bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt-> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $this->dbConn->CloseConn();   
        }catch(PDOException $erro){
            echo "erro setUser : " . $erro->getMessage();
            exit();
        }
        
    }

    function setEmail($id,$email){
        try{
           $this->dbConn = new BDD();
        $sql = "UPDATE usuario SET emailUsuario= :email WHERE idUsuario=:id";
        $stmt = $this->dbConn->PrepareSQL($sql);
        $stmt-> bindParam(':email', $email, PDO::PARAM_STR);
        $stmt-> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $this->dbConn->CloseConn(); 
        }catch(PDOException $erro){
            echo "erro setUser: " . $erro->getMessage();
            exit();
        }
        
    }

    function setSenha($id,$senha, $conn){
        try{
           $this->dbConn = new BDD();
        $sql = "UPDATE usuario SET senhaUsuario= :senha WHERE idUsuario=:id";
        $stmt = $this->dbConn->PrepareSQL($sql);
        $stmt-> bindParam(':senha', $senha, PDO::PARAM_STR);
        $stmt-> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $this->dbConn->CloseConn(); 
        }catch(PDOException $erro){
            echo "erro setUser: " . $erro->getMessage();
            exit();
        }
        
    }

    function DeleteUsuario($id,$conn){
        try{
         $this->dbConn = new BDD();
        $sql = "DELETE FROM usuario WHERE idUsuario= :id";
        $stmt = $this->dbConn->PrepareSQL($sql);
        $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt -> execute();
        $this->dbConn->CloseConn();   
        }catch(PDOException $erro){
            echo "erro setUser: " . $erro->getMessage();
            exit();
        }
        
    }

    function SetUsuario($nome,$email,$senha){
        try{
          $this->dbConn = new BDD();
        $sql = "INSERT INTO usuario(nomeUsuario,emailUsuario, senhaUsuario) VALUES(:nome,:email,:senha)";
        $stmt = $this->dbConn->PrepareSQL($sql);
        $stmt-> bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt-> bindParam(':email', $email, PDO::PARAM_STR);
        $stmt-> bindParam(':senha', $senha, PDO::PARAM_STR);
        $stmt-> execute();
        $this->dbConn->CloseConn();  
        }catch(PDOException $erro){
            echo "erro setUser: " . $erro->getMessage();
            exit();
        }
        
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
        try{
         $this->dbConn = new BDD();
        $sql = "SELECT * FROM vw_infoUsuario WHERE idUsuario = :id";
        $stmt = $this->dbConn->PrepareSQL($sql);
        $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt -> execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->dbConn->CloseConn();
        return $result;   
        }catch(PDOException $erro){
            echo "erro setUser: " . $erro->getMessage();
            exit();
        }
        
    }

    function getEmail($email){
        try{
         $this->dbConn = new BDD();
        $sql = "Select emailUsuario FROM usuario WHERE  emailUsuario = :email";
        $stmt = $this->dbConn->PrepareSQL($sql);
        $stmt-> bindParam(':email', $email, PDO::PARAM_STR);
        $stmt-> execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->dbConn->CloseConn();
        return $result;   
        }catch(PDOException $erro){
            echo "erro setUser: " . $erro->getMessage();
            exit();
        }
        
    }

    function deleteUser($id){
        try{
         $this->dbConn = new BDD();
        $sql = "DELETE FROM usuario WHERE idUsuario = :id";
        $stmt = $this->dbConn->PrepareSQL($sql);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $this->dbConn->CloseConn();
        
        }catch(PDOException $erro){
            echo "erro setUser: " . $erro->getMessage();
            exit();
        }
    }

}