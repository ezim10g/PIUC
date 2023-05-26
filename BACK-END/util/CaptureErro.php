<?php
function CaptureErro($erro,$erroMessage){
    header("location: ../../FRONT-END/index.php?". $erro ."=". $erroMessage);
    exit();
}
