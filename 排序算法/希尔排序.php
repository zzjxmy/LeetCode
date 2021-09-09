<?php
$a = [];

for($i = 0;$i <= 10; $i++){
    $a[] = $i;
}

shuffle($a);

//希尔排序目的为了加快速度改进了插入排序，交换不相邻的元素对数组的局部进行排序，并最终用插入排序将局部有序的数组排序。
//在此我们选择增量 gap=length/2，缩小增量以 gap = gap/2 的方式，用序列 {n/2,(n/2)/2...1} 来表示。
for($gap = intval(count($a)/2); $gap > 0; $gap /= 2){
    for($j = $gap; $j < count($a); $j++){
        $k = $j;
        while (($k - $gap >= 0 ) && $a[$k] < $a[$k - $gap]){
            $temp = $a[$k];
            $a[$k] = $a[$k - $gap];
            $a[$k - $gap] = $temp;
            $k -= $gap;
        }
    }
}

var_dump($a);