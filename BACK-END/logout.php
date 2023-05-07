<?php
setcookie('token', "", time() - 604800, '/', '', true, true);
header("location: ../FRONT-END/index.php?aviso=logout");
        exit();
?>