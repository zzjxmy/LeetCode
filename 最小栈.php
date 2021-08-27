<?php
class Stack{

    protected $stack;
    protected $helpStack;

    public function __construct()
    {
        $this->stack = new SplStack();
        $this->helpStack = new SplStack();
    }

    //因为栈的特性，后进先出，所以，我们只需要把当前push的值与辅助栈的栈顶元素进行比较
    //如果小于等于当前值，我们则放入到栈顶
    //出栈的时候，如果当前出栈的元素和辅助栈的栈顶元素相同，则把辅助栈也出栈
    //例如， 3，2，6，1先后入栈
    // 3 进栈 一开是为空， 栈：3进栈  辅助栈：3进栈   此时辅助栈里面 3
    // 2 进栈  栈：2进栈  辅助栈： 2 <= 3 （栈顶元素） ，所以2进栈 此时辅助栈里面 3,2
    // 6 进栈  栈：6进栈  辅助栈： 6 不小于等于 2 （栈顶元素），所以 6不进栈  此时辅助栈里面 3,2
    // 1 进栈  栈：1进栈  辅助栈： 1 <= 2 （栈顶元素），所以 1进栈  此时辅助栈里面 3,2,1
    //
    // 1 出栈  栈：1出栈  辅助栈： 1 == 1 （栈顶元素），所以 1出栈。此时辅助栈里面 3，2
    // 6 出栈  栈：6出栈  辅助栈： 6 != 2 （栈顶元素），不需要出栈
    // 2 出栈  栈：2出栈  辅助栈： 2 == 2 （栈顶元素），所以 2出栈。此时辅助栈里面 3
    // 3 出栈  栈：3出栈  辅助栈： 3 == 3 （栈顶元素），所以 3出栈。此时辅助栈里面 为空
    public function push($val){
        $this->stack->push($val);
        if($this->stack->isEmpty()){
            $this->helpStack->push($val);
        }else{
            $min = $this->getMin();
            if($min >= $val){
                $this->helpStack->push($val);
            }
        }
    }

    public function pop(){
        if($this->stack->isEmpty()) return null;

        $val = $this->stack->pop();

        $min = $this->getMin();

        if($min == $val){
            $this->helpStack->pop();
        }

        return $val;
    }

    public function top(){
        if($this->stack->isEmpty()) return null;
        $val = $this->stack->pop();
        $this->stack->push($val);
        return $val;
    }

    public function getMin(){

        if(!$this->helpStack->isEmpty()){
            $min = $this->helpStack->pop();
            $this->helpStack->push($min);
            return $min;
        }

        return null;
    }
}