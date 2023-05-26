<?php
 
 
class UsuarioDAO{

    function __construct(){
        
    }

    function setNome($id,$nome){
        $sql = "UPDATE usuario SET nomeUsuario= :nome WHERE idUsuario=:id";
        $stmt = PrepareSQL($sql);
        $stmt-> bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt-> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    function setEmail($id,$email){
        $sql = "UPDATE usuario SET email= :email WHERE idUsuario=:id";
        $stmt = PrepareSQL($sql);
        $stmt-> bindParam(':email', $email, PDO::PARAM_STR);
        $stmt-> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    function setSenha($id,$senha, $conn){
        $sql = "UPDATE usuario SET senhaUsuario= :senha WHERE idUsuario=:id";
        $stmt = PrepareSQL($sql);
        $stmt-> bindParam(':senha', $senha, PDO::PARAM_STR);
        $stmt-> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    function DeleteUsuario($id,$conn){
        $sql = "DELETE FROM usuario WHERE idUsuario= :id";
        $stmt = PrepareSQL($sql);
        $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt -> execute();
    }

    function SetUsuario($nome,$email,$senha){
        $sql = "INSERT INTO usuario(nomeUsuario,email, senhaUsuario) VALUES(:nome,:email,:senha)";
        $stmt = PrepareSQL($sql);
        $stmt-> bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt-> bindParam(':email', $email, PDO::PARAM_STR);
        $stmt-> bindParam(':senha', $senha, PDO::PARAM_STR);
        $stmt-> execute();
    }

    function getALL($email){
        $sql = "SELECT * FROM usuario WHERE email = :email";
        $stmt = PrepareSQL($sql);
        $stmt-> bindParam(':email', $email, PDO::PARAM_STR);
        $stmt-> execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function getInfo($id){
        $sql = "SELECT * FROM vw_infoUsuario WHERE idUsuario = :id";
        $stmt = PrepareSQL($sql);
        $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt -> execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function getEmail($email){
        $sql = "Select email FROM usuario WHERE  email = :email";
        $stmt = PrepareSQL($sql);
        $stmt-> bindParam(':email', $email, PDO::PARAM_STR);
        $stmt-> execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

}