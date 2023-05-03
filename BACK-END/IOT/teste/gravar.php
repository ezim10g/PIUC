
<?php

    $redis = new Redis();
    $redis->connect('127.0.0.1'); //conecta na porta padao
    
    if($redis){
      echo "conectado <br>";
    }else{
      echo "erro ao conectar";
    }

   
    /*Passar dados para o banco em 5 seg na váriavel vento*/ 
  
    if(isset($_GET['vento'])){

      $i=0;

      while (TRUE) {
        $vento = $i;
        $redis->set('vento', $vento); 
        $i++;
        sleep(5);
      }
      
        
    }




?>


</html>