

<?php
            $redis = new Redis();
               $redis->connect('127.0.0.1');            

            if(isset($_GET['mostrar'])){
                $vento = $redis->get('vento');                        
                $rpm = $redis->get('rpm');

                $data = array('vento' => $vento, 'rpm' => $rpm);

                $json = json_encode($data);
                
                header('Content-Type: application/json');
               
                echo $json;

            }

?>   

