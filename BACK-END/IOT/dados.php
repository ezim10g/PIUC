
<?php

    $redis = new Redis();
    $redis->connect('127.0.0.1'); //conecta na porta padao
    
    if($redis){
      echo "conectado <br>";
    }else{
      echo "erro ao conectar";
    }

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

  
    if(isset($_GET['pich'])){

        $pich = $_GET['pich'];
        $redis->set('pich', $ataque, 10); //cria uma chave que expira em 10 seg
        
    }


    if(isset($_GET['mostrar'])){

      
      echo $redis->get('vento'); //buca o valor da chave nome
      echo <br>
      echo $redis->get('tensao'); //buca o valor da chave nome
      echo <br>
      echo $redis->get('rpm'); //buca o valor da chave nome
      echo <br>
      echo $redis->get('yaw'); //buca o valor da chave nome
      echo <br>
      echo $redis->get('pich'); //buca o valor da chave nome
    
    }
    
?>


</html>