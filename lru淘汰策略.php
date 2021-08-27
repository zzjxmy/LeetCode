<?php

class Node{
    public $value;

    /**
     * @var Node
     */
    public $next = null;
    /**
     * @var Node
     */
    public $prev = null;

    public function __construct($value)
    {
        $this->value = $value;
    }
}


class ListNode{

    public $root;
    public $lens = 0;

    public function __construct()
    {
        $node = new Node("root");
        $node->prev  = $node;
        $node->next = $node;

        $this->root = $node;
        $this->lens = 0;
    }

    /**
     * @return Node
     */
    public function head(){
        return $this->root->prev;
    }

    /**
     * @return Node
     */
    public function tail(){
        return $this->root->next;
    }

    public function append($value){
        $node = new Node($value);
        $node->prev = $this->tail();
        $this->tail()->next = $node;
        $this->root->next = $node;
        $this->lens += 1;
    }

    public function remove(Node $node){

        if($node === $this->root){
            return false;
        }elseif ($node === $this->head()){
            $this->root->prev = $node->next;
        }elseif($node->next){
            $node->next->prev = $node->prev;
        }

        $node->prev->next = $node->next;
        unset($node);
        $this->lens -= 1;
    }

    public function __toString()
    {
        $node = $this->root;

        $str = '';
        while (true){
            $str .= '->' . $node->value;
            if($node->next){
                $node = $node->next;
            }else{
                break;
            }
        }

        return $str;
    }

}


class LRU {

    public $size = 0;
    public $listNode = null;

    public function __construct($size)
    {
        $this->size = $size;
        $this->listNode = new ListNode();
    }

}

