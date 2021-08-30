<?php
$a = [];

for($i = 0;$i <= 10; $i++){
    $a[] = $i;
}

shuffle($a);

for($i = 0; $i < count($a); $i++){
    $isSort = true;
    for($j = 0;$j < (count($a) - $i - 1); $j++){
        if($a[$j] > $a[$j + 1]){
            $temp = $a[$j];
            $a[$j] = $a[$j + 1];
            $a[$j+1] = $temp;
        }
    }
}

var_dump(implode(',', $a));