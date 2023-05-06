

<?php
            $redis = new Redis();
               $redis->connect('127.0.0.1');            

            if(isset($_GET['mostrar'])){
                $vento = $redis->get('vento');                        
                $tensao = $redis->get('tensao');                        
                $rpm = $redis->get('rpm');
                $yaw = $redis->get('yaw');
                $pitch = $redis->get('pitch');

                $data = array('vento' => $vento, 'tensao' => $tensao ,'rpm' => $rpm, 'yaw' => $yaw , 'pitch' => $pitch);

                $json = json_encode($data);
                
                header('Content-Type: application/json');
               
                echo $json;

            }

?>   

