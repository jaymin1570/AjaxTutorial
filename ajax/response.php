<?php

$data = $_GET['datavalue'];

$a = array('Pune','Mumbai');
$b = array('Gorkhpur','Luckknow');
$c = array('Patana','Kishanganj');

if($data == "Maharastra"){
    foreach($a as $a1){
        echo "<option> $a1 </option>";
    }
}
if($data == "Up"){
    foreach($b as $b1){
        echo "<option> $b1 </option>";
    }
}
if($data == "Bihar"){
    foreach($c as $c1){
        echo "<option> $c1 </option>";
    }
}


?>