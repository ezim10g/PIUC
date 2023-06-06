<?php
session_start();
require_once (dirname(__FILE__) ."../AutenticateController.php");

include (dirname(__FILE__) . "../../Model/Usuario.php");

$usuario = new Usuario();

if(verificar_autenticacao()){
   $usuario->deletarUsuario($_SESSION['id']); 
   session_destroy();
   header("location: ../../FRONT-END/index.php?message= Usuário excluido com sucesso!");
   exit();  
   
}else{
    header("location: ../../FRONT-END/index.php?Erro= erro ao exluir usuário!");
   exit();
}
