<?php
session_start();
session_unset();
header("location: ../FRONT-END/index.php?aviso=logout");
        exit();
?>