<?php
 include "db_conn.php";

class UsuarioDAO{

    function __construct(){
        
    }

    function setNome($id,$nome, $conn){
        $sql = "UPDATE usuario SET nomeUsuario= :nome WHERE idUsuario=:id";
        $stmt = $conn->prepare($sql);
        $stmt-> bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt-> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    function setEmail($id,$email, $conn){
        $sql = "UPDATE usuario SET email= :email WHERE idUsuario=:id";
        $stmt = $conn->prepare($sql);
        $stmt-> bindParam(':email', $email, PDO::PARAM_STR);
        $stmt-> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    function setSenha($id,$senha, $conn){
        $sql = "UPDATE usuario SET senhaUsuario= :senha WHERE idUsuario=:id";
        $stmt = $conn->prepare($sql);
        $stmt-> bindParam(':senha', $senha, PDO::PARAM_STR);
        $stmt-> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    function DeleteALL($id){
        $sql = "";
        $stmt = $conn->prepare($sql);
        $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt -> execute();
    }
}


$user = new UsuarioDAO();
$user->setSenha(9,"senha", $conn);