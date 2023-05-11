<?php
 include "db_conn.php";

 class PerfilDAO{

    function setPerfil($idUsuario){
        $sql = "INSERT INTO perfil(idUsuario, idTipoPerfil, fotoPerfil, NewsLetter) VALUES (:idUsuario, 3, 'profile.jpg', true)";
        $stmt = PrepareSQL($sql);
        $stmt-> bindParam(':idUsuario', $idUsuario,PDO::PARAM_INT);
        $stmt->execute();
    }


 }

 $perfil = new PerfilDAO();
 $perfil->setPErfil(13);
