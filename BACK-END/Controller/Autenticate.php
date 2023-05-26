<?php
include "../Model/Token.php";
function verificar_autenticacao() { 
    if ($_SESSION['token'] ==   ) {
        return true;
    } else {
        return false;
    }
}