<?php
session_start();
include "db_conn.php";
include "validateData.php";

if(isset($_POST['usuario']) && isset($_POST['email']) && isset($_POST['senha'])){

    $usuario = Validate($_POST['usuario']);
    $email = Validate($_POST['email']);
    $senha = Validate($_POST['senha']);

    if(empty($_POST['usuario'])){
        header("location: ../FRONT-END/index.php?registererror=O Usuário é necessário!");
        exit();
    }else if(validateNameUser($usuario)){
        header("location: ../FRONT-END/index.php?registererror=Nome de usuário é grande demais");
        exit();
    }else if(empty($_POST['email'])){
        header("location: ../FRONT-END/index.php?registererror=O E-mail é necessário!");
        exit();
    }else if(!ValidateEmail($email)){
        header("location: ../FRONT-END/index.php?registererror=O E-mail não está correto!!");
        exit();
    }else if(empty($_POST['senha'])){
        header("location: ../FRONT-END/index.php?registererror=A senha é necessário!");
        exit();
    }else{
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        

        $sql = "INSERT INTO usuario(nomeUsuario,email, senhaUsuario) VALUES('$usuario','$email','$senha')";
        mysqli_query($conn, $sql);

        header("location: ../FRONT-END/index.php?aviso=Usuário cadastrado com sucesso!");
        exit();
    }


}else{
    header("location: ../FRONT-END/index.php?registererror=erro");
    exit();
}