<?php
include (__DIR__ .'/../DAO/db_conn.php');
include (__DIR__ ."/../Model/Token.php");

function verificar_autenticacao(){
    if(isset($_SESSION['token'])){
        return true;
    }
    return false;
}
/*function verificar_autenticacao(){
    if (isset($_SESSION['token'])) {
        $tokenUsuario = $_SESSION['token'];
        $token = new Token($_SESSION['id']);
        if ($token->autenticateToken($tokenUsuario)) {
           return true;
       }
        return false;
    }

}*/