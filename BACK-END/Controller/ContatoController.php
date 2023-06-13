<?php
include (__DIR__ .'/../DAO/db_conn.php');
include_once (dirname(__FILE__) . "../../DAO/ContatoDAO.php");

if(isset($_POST)){
    $contato = new ContatoDAO();
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $assunto = $_POST['assunto'];
    $mensagem = $_POST['mensagem'];
    $contato->setContato($nome,$email,$assunto,$mensagem);
    header("location: ../../FRONT-END/index.php");
    exit();

}{
    header("location: ../../FRONT-END/index.php");
    exit();
}
