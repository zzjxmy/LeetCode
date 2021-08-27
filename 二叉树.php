<?php
class Node{
    public $val;
    public $left;
    public $right;

    public function __construct($val = null, $left = null, $right = null)
    {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

class Test{

    public $nodeLevel = 2;
    public $head = null;

    public function __construct()
    {
        $this->head = new Node(1);
    }

    public function createNode($node, $level = 0){
        if($this->nodeLevel >= $level){
            $node->left = new Node($node->val * 2);
            $node->right = new Node($node->val * 2 + 1);
            $this->createNode($node->left, $level + 1);
            $this->createNode($node->right, $level + 1);
        }
    }

    //前序遍历  根左右
    public function preorder($node){
        if($node === null) return;
        echo $node->val;
        $this->preorder($node->left);
        $this->preorder($node->right);
    }

    //中序遍历 左根右
    public function middle($node){
        if($node === null) return;
        $this->preorder($node->left);
        echo $node->val;
        $this->preorder($node->right);
    }

    //后序遍历 左右根
    public function epilogue($node){
        if($node === null) return;
        $this->preorder($node->left);
        $this->preorder($node->right);
        echo $node->val;
    }

    //层序遍历
    public function sequence($node, $level){
        if($node === null) return;
        $this->res[$level][] = $node->val;
        $this->sequence($node->left, $level + 1);
        $this->sequence($node->right, $level + 1);
    }

    //层序遍历 - 队列的形式
    public function sequenceByQueue($node){
        $queue = new SplQueue();
        $queue->push($node);

        while (!$queue->isEmpty()){
            $node = $queue->shift();
            echo $node->val;
            if($node->left) $queue->push($node->left);
            if($node->right) $queue->push($node->right);
        }
    }

}



$test = new Test();
$test->createNode($test->head, 1);
$test->preorder($test->head);
//$test->middle($test->head);
//$test->epilogue($test->head);
//$test->sequence($test->head, 0);
//var_dump($test->res);

//$test->sequenceByQueue($test->head);
