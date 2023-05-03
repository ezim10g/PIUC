
<?php

    $redis = new Redis();
    $redis->connect('127.0.0.1'); //conecta na porta padao
    
    if($redis){
      echo "conectado <br>";
    }else{
      echo "erro ao conectar";
    }

//ler dados do banco de dados

    if(isset($_GET['vento'])){
      
      while(true){
        echo $redis->get('vento'); //buca o valor da chave nome
        sleep(2);
      }

    }
    
?>


</html>