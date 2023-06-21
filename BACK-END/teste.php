<?php
include "DAO/QueryDAO.php";

$query = new QUERY("perfil");

$table = "perfil";
$columns = array("nomeUsuario","emailUsuario", "fotoUsuario");
$condition = array( "idUsuario");
echo $query->Select($table,$columns,$condition);