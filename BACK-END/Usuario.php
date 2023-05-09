<?php
class Usuario{
    $id;
    $nome;
    $email;

    __construct($id, $nome, $email){
        this->id = $id;
        this->nome = $nome;
        this->email = $email;
    }

    function setNome($nome){
        this->nome = userUpdate($nome, 'nomeUsuario', 'Usuario'); 
    }
}