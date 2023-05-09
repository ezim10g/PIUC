<?php
function Validate($data){
        //função usada para remover os espaços em branco do início e fim da String
        $data = trim($data);
        //função usada para remover as aspas invertidas da String, impedindo que haja SQL Injection
        $data = stripcslashes($data);
        //função usada para converter caracteres html("<" e ">") em caracteres normais, para quando for exibido no site, não ser confundido;
        $data = htmlspecialchars($data);
        return $data;
    }

function ValidateEmail($data){
    $regex = "/^\w+([\.-]?\w+)*@\w+([\.-]?w+)*(\.\w{2,3})+$/";
    if(preg_match($regex, $data) == 1){
        return true;
    }else{
        return false;
    }
}

function validateNameUser($data){
    if(strlen($usuario) > 25){
        return true;
    }else{
        return false;
    }
}


