<?php

Include  'RouteSwitch.php';

class Router extends RouteSwitch{

    function run($requestUrl){
        $route = substr($requestUrl, 11);

        if($route == ''){
            $this->home();
        }else{
            $this->notFound();
        }
    }

}