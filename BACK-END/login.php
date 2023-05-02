<?php
session_start();
include "db_conn.php";
if(isset($_POST['email']) && isset($_POST['senha'])){
    //função que trata as Strings recebidas pelo metodo post
    function Validate($data){
        //função usada para remover os espaços em branco do início e fim da String
        $data = trim($data);
        //função usada para remover as aspas invertidas da String, impedindo que haja SQL Injection
        $data = stripcslashes($data);
        //função usada para converter caracteres html("<" e ">") em caracteres normais, para quando for exibido no site, não ser confundido;
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = Validate($_POST['email']);
    $senha = Validate($_POST['senha']);

    if(empty($email)){
        header("location: ../FRONT-END/index.php?loginerror=O email é necessário!");
        exit(); 
    }else if(empty($senha)){
        header("location: ../FRONT-END/index.php?loginerror=A senha é necessário!");
        exit(); 
    } else{
        $sql = "SELECT * FROM usuario WHERE email = '$email' AND senhaUsuario = '$senha'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            print_r($row);
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