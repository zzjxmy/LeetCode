<?php
class commonDivisor{
    //辗转相除法
    //原理：两个整数 a 和 b (a > b)，则 a 和 b 的最大公约数 等于 b 和 a % b 的最大公约数
    //在两个值都比较大的时候，求模运算效率低下
    public function zhanZhuanXiangChuFa($num1, $num2){

        if($num1 == $num2) return $num1;

        if($num1 > $num2){
            $max = $num1;
            $min = $num2;
        }else{
            $min = $num1;
            $max = $num2;
        }

        $yuShu = $max % $min;
        if($yuShu == 0) return $min;
        return $this->zhanZhuanXiangChuFa($min, $yuShu);

    }

    //更相减损术
    //原理：两个整数 a 和 b (a > b)，则 a 和 b 的最大公约数 等于 b 和 a-b 的最大公约数
    //在两个值差比较的大的时候，递归次数比较多
    //例如 1000 和 1 求最大公约数，需要递归999次
    public function genXiangJianShunShu($num1, $num2){
        if($num1 == $num2) return $num1;

        if($num1 > $num2){
            $max = $num1;
            $min = $num2;
        }else{
            $min = $num1;
            $max = $num2;
        }

        $diff = $max - $min;
        return $this->genXiangJianShunShu($min, $diff);
    }

    //辗转相除法 和 更相减损术 结合
    public function zhanZhuanXiangChuFaAndGenXiangJianShunShu($num1, $num2){

        if($num1 == $num2) return $num1;

        if($num1 > $num2){
            $max = $num1;
            $min = $num2;
        }else{
            $min = $num1;
            $max = $num2;
        }

        //偶数除于2
        if($min & 1 == 0 && $max & 1 == 0){
            $min = $min >> 1;
            $max = $max >> 1;
        }elseif ($min & 1 == 0){
            $min = $min >> 1;
        }elseif ($max & 1 == 0){
            $max = $max >> 1;
        }else{ #两个数都是奇数时
            $max = $max - $min; #这样能保证 奇数 - 奇数 结果肯定是偶数
        }

        return $this->zhanZhuanXiangChuFaAndGenXiangJianShunShu($min, $max);
    }
}


$obj = new commonDivisor();
var_dump($obj->zhanZhuanXiangChuFa(319, 377));
var_dump($obj->genXiangJianShunShu(319, 377));
var_dump($obj->zhanZhuanXiangChuFaAndGenXiangJianShunShu(319, 377));
