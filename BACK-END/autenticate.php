<?php
session_start();
//função que retorna true se o usuário estiver autenticado e false se não
function verificar_autenticacao() {
    

    if (isset($_SESSION['token'])) {
        return true;
    } else {
        return false;
    }
}


/*

$time = 2 * 60 * 60; // Defini 2 horas

session_set_cookie_params($time);
session_start();


https://pt.stackoverflow.com/questions/110080/como-manter-a-sess%C3%A3o-ap%C3%B3s-o-fechamento-do-navegador
*/