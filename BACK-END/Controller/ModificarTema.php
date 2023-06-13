<?php
session_start();

    if(isset($_GET)){
        if($_GET['tema'] == "escuro"){
            $_SESSION['tema'] = "escuro";
        }else if($_GET['tema'] == "claro"){
            $_SESSION['tema'] = 'claro';
            
        }else{
            echo "Mudança de tema fora de sistema";
        }

    }