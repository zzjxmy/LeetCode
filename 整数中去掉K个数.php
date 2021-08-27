<?php
//题目：给出一个整数，从整数中去掉k个数，要求剩下的数字形成的新整数尽可能的小

$num = "10593212";

$del = 3;
$k = 0;
for($i = 0; $i < strlen($num) - 1; $i ++){
    if($num[$i] > $num[$i + 1]){
        $num = substr($num, 0, $i) . substr($num, $i + 1, strlen($num) - 1);
        $num = ltrim($num, '0');
        $k ++;
        $i = 0;
        $i --;
        if($k == $del) break;
    }
}

//还有未删除的，则表示整个是顺序的了，则从后面一次删除
if($k != $del) $num = substr($num, 0, -($del - $k));

var_dump($num);

