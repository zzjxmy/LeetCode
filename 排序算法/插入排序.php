<?php
$a = [];

for($i = 0;$i <= 10; $i++){
    $a[] = $i;
}

shuffle($a);

for($i = 0; $i < count($a); $i ++){
    $k = $i;
    for ($j = $i; $j >= 0; $j--){
        if($a[$k] < $a[$j]){
            $temp = $a[$k];
            $a[$k] = $a[$j];
            $a[$j] = $temp;
            $k--;
        }
    }
}

var_dump($a);