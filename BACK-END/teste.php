<?php
$datetime1 = date_create('2009-10-06');
$datetime2 = date_create('2009-10-13');
$interval = date_diff($datetime1, $datetime2);
echo $interval->format('%R%a');
if($interval->format('%R%a') > 0){
    echo "é maior";
}else{
    echo 'é menor';
}
?>