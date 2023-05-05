

<?php
            $redis = new Redis();
               $redis->connect('127.0.0.1');            

            if(isset($_GET['mostrar'])){
                echo $redis->get('vento');
                echo "|";
                echo $redis->get('rpm');

            }

?>   

