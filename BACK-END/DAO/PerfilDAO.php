<?php

 class PerfilDAO{

    function setPerfil($idUsuario){
        $sql = "INSERT INTO perfil(idUsuario, idTipoPerfil, fotoPerfil, NewsLetter) VALUES (:idUsuario, 3, 'profile.jpg', true)";
        $stmt = PrepareSQL($sql);
        $stmt-> bindParam(':idUsuario', $idUsuario,PDO::PARAM_INT);
        $stmt->execute();
    }

    function setFotoPerfil($fotoPerfil, $id){
        $sql = "UPDATE perfil SET fotoPerfil = :fotoPerfil WHERE idUsuario = :id";
        $stmt = PrepareSQL($sql);
        $stmt-> bindParam(':fotoPerfil', $fotoPerfil,PDO::PARAM_STR);
        $stmt-> bindParam(':id', $id,PDO::PARAM_INT);
        $stmt-> execute();
    }


 }


