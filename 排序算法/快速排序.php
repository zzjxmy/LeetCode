<?php
$a = [];

for($i = 0;$i <= 10; $i++){
    $a[] = $i;
}

shuffle($a);

$startTime = microtime(true);

function quick_sort(&$arr, $left, $right){

    if(count($arr) <= 1 || $left > $right) return $arr;

    //定义基准数
    $index = $arr[$left];

    $tempLeft  = $left;
    $tempRight = $right;

    while ($tempLeft < $tempRight){
        //优先从右边开始找比基准数小的数字
        //如果优先从左边开始找比基准数大的值，则最后左右指针相遇会在比基准数大的值
        //最后交换基准数与相遇点，会导致左边的值会出现比基准数大的值

        while($arr[$tempRight] >= $index && $tempLeft < $tempRight){
            //找到一个比基准数小的
            $tempRight --;
        }

        while($arr[$tempLeft] <= $index && $tempLeft < $tempRight){
            //找到一个比基准数大的
            $tempLeft ++;
        }

        if($tempLeft < $tempRight){
            $temp = $arr[$tempRight];
            $arr[$tempRight] = $arr[$tempLeft];
            $arr[$tempLeft] = $temp;
        }

    }
    $temp = $arr[$left];
    $arr[$left] = $arr[$tempLeft];
    $arr[$tempLeft] = $temp;
    quick_sort($arr, $left, $tempLeft - 1);
    quick_sort($arr, $tempLeft + 1, $right);
    return $arr;
}

var_dump(implode(',', $a));
$arr = quick_sort($a, 0, count($a) - 1);

var_dump(implode(',', $arr));

$endTime = microtime(true);

$time = $endTime - $startTime;

var_dump($time);