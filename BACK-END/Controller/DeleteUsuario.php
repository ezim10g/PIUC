<?php
session_start();
require_once(dirname(__FILE__) . "../AutenticateController.php");

include(dirname(__FILE__) . "../../Model/Usuario.php");

$usuario = new Usuario();
if (isset($_POST)) {

   if (verificar_autenticacao()) {
      try {
         $usuario->deletarUsuario($_SESSION['id']);
         session_destroy();
         header("location: ../../FRONT-END/index.php?message= Usuário excluido com sucesso!");
         exit();
      }catch(Exception $erro){
         echo "erro: " . $erro->getMessage();
      }


   } else {
      header("location: ../../FRONT-END/index.php?Erro= erro ao exluir usuário!");
      exit();
   }

}

header("location: ../../FRONT-END/index.php");
exit();