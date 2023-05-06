<?php
require_once('autenticate.php');
function login(){
    if (!verificar_autenticacao()) {
            echo "<button class='btnLogin-popup'>Login</button>";;
    } else {
        echo "<button class='btnLogin-popup'>Sair</button>";
    }
}
    
                 