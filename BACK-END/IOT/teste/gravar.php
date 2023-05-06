
<?php

    $redis = new Redis();
    $redis->connect('127.0.0.1'); //conecta na porta padao
    

    if(isset($_GET['vento'])){

        $vento = $_GET['vento'];
        $redis->set('vento', $vento, 10); //cria uma chave que expira em 10 seg
        
    }

    if(isset($_GET['tensao'])){

        $tensao = $_GET['tensao'];
        $redis->set('tensao', $tensao, 10); //cria uma chave que expira em 10 seg
        
    }

    if(isset($_GET['rpm'])){

        $rpm = $_GET['rpm'];
        $redis->set('rpm', $rpm, 10); //cria uma chave que expira em 10 seg
        
    }

    if(isset($_GET['yaw'])){

        $yaw = $_GET['yaw'];
        $redis->set('yaw', $yaw, 10); //cria uma chave que expira em 10 seg
        
    }

  
    if(isset($_GET['pitch'])){

        $pich = $_GET['pitch'];
        $redis->set('pitch', $ataque, 10); //cria uma chave que expira em 10 seg
        
    }
  
?>


</html>