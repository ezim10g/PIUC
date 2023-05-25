<?php
session_start();

include "./LogarController.php";


if(isset($_POST['email']) && isset($_POST['senha'])){
    LogarController($_POST['email'],$_POST['senha']);
    header("location: ../../FRONT-END/index.php?message=Login feito com sucesso!");
    exit();   
}else{
    header("location: ../../FRONT-END/index.php?loginerror=insira os dados corretamente!");
    exit();
}

