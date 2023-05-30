<?php
//$time = 2 * 60 * 60; // Defini 2 horas

//session_set_cookie_params($time);
session_start();

include "./LogarController.php";
include "../util/CaptureErro.php";


if(isset($_POST['email']) && isset($_POST['senha'])){
    LogarController($_POST['email'],$_POST['senha']);
    header("location: ../../FRONT-END/index.php?message=bah!");
    exit();   
}else{
    CaptureErro("loginerror","Insira os dados corretamente!");
}

