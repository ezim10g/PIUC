<?php
session_start();
include "db_conn.php";
include "validateData.php";
if(isset($_POST['email']) && isset($_POST['senha'])){

    $email = Validate($_POST['email']);
    $senha = Validate($_POST['senha']);

    if(empty($email)){
        header("location: ../FRONT-END/index.php?loginerror=O email é necessário!");
        exit(); 
    }else if(empty($senha)){
        header("location: ../FRONT-END/index.php?loginerror=A senha é necessário!");
        exit(); 
    } else{

        $sql = "SELECT * FROM usuario WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $senhaHash = $row['senhaUsuario'];
        if(password_verify($senha, $senhaHash)){
            $_SESSION['idUsuario'] = $row['idUsuario'];
            $_SESSION['nomeUsuario'] = $row['nomeUsuario'];
            $_SESSION['emailUsuario'] = $row['email'];
            $token = bin2hex(random_bytes(32));
            $_SESSION['token'] = $token;
            setcookie('token', $token, time() + 604800, '/', '', true, true);
            header("location: ../FRONT-END/index.php");
            exit(); 
        }else{
            header("location: ../FRONT-END/index.php?loginerror=Usuário não encontrado!");
            exit(); 
        }
    }
}else{
    header("location: ../FRONT-END/index.php?loginerror=insira os dados corretamente!");
    exit();
}