<?php
session_start();
//função que retorna true se o usuário estiver autenticado e false se não
function verificar_autenticacao() {
    

    if (isset($_SESSION['token']) && isset($_COOKIE['token']) && $_SESSION['token'] === $_COOKIE['token']) {
        return true;
    } else {
        return false;
    }
}
