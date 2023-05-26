<?php
session_start();

include "./LogarController.php";
include "../util/CaptureErro.php";


if(isset($_POST['email']) && isset($_POST['senha'])){
    LogarController($_POST['email'],$_POST['senha']);
    header("location: ../../FRONT-END/index.php?message=Login feito com sucesso!");
    exit();   
}else{
    CaptureErro("loginerror","Insira os dados corretamente!");
}

