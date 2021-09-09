<?php

$vale = [];
$weight = [];

$n = 5;
$c = 100;

//构建最优网格
$arr = [];
for($i = 0; $i < $n; $i++){
    for($j = 0; $j < $c ; $j ++){
        $arr[$i][$j] = 0;
    }
}

for($i = 0; $i < $n; $i++){
    for($j = 1; $j <= $c ; $j ++){
        if($i == 0){
            $arr[$i][$j - 1] = $weight[$i] <= $j ? $vale[$i] : 0;
        }else{
            //上一个网格的值
            $topValue = $arr[$i - 1][$j - 1];
        }
    }
}