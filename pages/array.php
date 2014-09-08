<?php
$age=array("Fadzli"=>"24","Ayu"=>"28","Amy"=>"20");

ksort($age);
arsort($age);

foreach($age as $name=>$value) {
    echo "Name=" . $name . ", Umur=" . $value;
    echo "\n";
}


?>