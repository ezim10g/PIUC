<?php
require_once('autenticate.php');
function dashboard(){
    if (verificar_autenticacao()) {
            echo "
            <div class='cards-container'>
            <div class='cards'>12V<br>Tensão</div>         
            <div class='cards'>30 Km/h<br>Vento</div>         
            <div class='cards'>250º<br> YAW</div>         
            <div class='cards'>60<br>RPM</div>         
            <div class='cards'>85º<br>Ataque</div>   
        </div>
            ";
        } else {
            echo"
                <div class='cards-container'>
                    <p>Faça login para ter acesso!</p>
                </div>
            ";
        }
}
    
                 