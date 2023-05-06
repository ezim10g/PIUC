
<?php

    $redis = new Redis();
    $redis->connect('127.0.0.1'); //conecta na porta padrao
    

    if(isset($_GET['gravar'])){

        $vento = $_GET['vento'];
        $redis->set('vento', $vento); 

        $tensao = $_GET['tensao'];
        $redis->set('tensao', $tensao); 

        $rpm = $_GET['rpm'];
        $redis->set('rpm', $rpm); 

        $yaw = $_GET['yaw'];
        $redis->set('yaw', $yaw); 

        $pich = $_GET['pitch'];
        $redis->set('pitch', $ataque); 
        
    }

    
?>


