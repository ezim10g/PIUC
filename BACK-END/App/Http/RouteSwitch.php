<?php

abstract class RouteSwitch{

    function home(){
        require '../../FRONT-END/index.php';
    }

    function notFound(){
        http_response_code(404);
        require '../View/NotFound.html';
    }
}

