<?php
class StackImplementsQueue{

    protected $stack;
    protected $helpStack;

    public function __construct()
    {
        $this->stack = new SplStack();
        $this->helpStack = new SplStack();
    }

    public function push($val){
        $this->stack->push($val);
    }

    //推到另一个辅助栈
    //从辅助栈出
    //再次把辅助栈推到栈里面
    public function pop(){
        $pop = null;
        if(!$this->helpStack->isEmpty()){
            $pop = $this->helpStack->pop();
        }else{
            while(!$this->stack->isEmpty()){
                $this->helpStack->push($this->stack->pop());
            }

            if(!$this->helpStack->isEmpty()){
                $pop = $this->helpStack->pop();
            }
        }

        return $pop;
    }

}

$obj = new StackImplementsQueue();
$obj->push(1);
$obj->push(2);
$obj->push(3);
$obj->push(4);
$obj->push(5);

var_dump($obj->pop());
$obj->push(6);
var_dump($obj->pop());
$obj->push(7);
var_dump($obj->pop());
var_dump($obj->pop());
$obj->push(8);
var_dump($obj->pop());
var_dump($obj->pop());
var_dump($obj->pop());
var_dump($obj->pop());
