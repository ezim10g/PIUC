<?php

class ContatoDAO{

    function __construct(){
        
    }

    function setContato($nome, $email, $assunto, $mensagem){
        try{
            $dbConn = new BDD();
          $sql = "INSERT INTO contato (nomeContato, emailContato, assuntoContato, mensagemContato) VALUES (:nome, :email, :assunto, :mensagem)";  
          $stmt = $dbConn->PrepareSQL($sql);
          $stmt-> bindParam (':nome', $nome);
          $stmt-> bindParam (':email', $email);
          $stmt-> bindParam (':assunto', $assunto);
          $stmt-> bindParam (':mensagem', $mensagem);
          $stmt-> execute();
          $dbConn->CloseConn();
        }catch(PDOException $erro){
            echo "erro setContato bah : " . $erro->getMessage();
            exit();
        }
        
    }

}