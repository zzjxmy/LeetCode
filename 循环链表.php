<?php
class Node{
    public $value;
    /**
     * @var Node
     */
    public $next = null;

    public function __construct($value)
    {
        $this->value = $value;
    }
}

$node1 = new Node(1);
$node2 = new Node(2);
$node3 = new Node(3);
$node4 = new Node(4);
$node5 = new Node(5);
$node6 = new Node(6);

$node1->next = $node2;
$node2->next = $node3;
$node3->next = $node4;
$node4->next = $node5;
$node5->next = $node6;
$node6->next = $node3;



//判断是否循环链表
//利用快慢指针，快指针走两步，慢指针走一步，当快指针追上慢指针，则表示有环
function hasHuan($slow, $fast){
    while ($slow !== null && $fast !== null){
        $slow = $slow->next;
        $fast = $fast->next->next;

        if($slow === $fast) return $fast;
    }

    return false;
}

var_dump(hasHuan($node1, $node1)?true:false);


//获取环的数量
//利用快慢指针，快指针走两步，慢指针走一步，当快指针追上慢指针，则表示有环
//从相遇点出发（快慢指针），再次相遇时，快指针比慢指针多走了一圈，从第一次相遇的时候记录数量
function huanNum($slow, $fast){
    if($xiangYuDian = hasHuan($slow, $fast)){
        $slow = $fast = $xiangYuDian;
        $i = 0;
        while ($slow !== null && $fast !== null){
            $i ++;
            $slow = $slow->next;
            $fast = $fast->next->next;

            if($slow === $fast) return $i;
        }
    }

    return 0;
}

var_dump(huanNum($node1, $node1));

//获取环的入点
//从第一次相遇开始，慢指针指向头节点，当再次相遇的时候，就是入环点
//这边我们假设一下
//从起点到入环点为 D
//入环点到第一次相遇点 距离为 S1
//从首次相遇点再次经过入环点的为S2

//则慢指针 P1 第一次相遇 所走的路为 D + S1
//快指针 P2  第一次相遇所走的路为 D + S1 + S2 + S1
//又因为 P2 走的是 P1 的两倍  所以得出： 2(D + S1) = D + S1 + S2 + S1
//简化一下  D = S2  即 从第一次相遇点开始 走到入环点的距离
//那么，我们经第一次相遇点时，把一个指针指向头指针 然后两个指针同时开始走，每次走一步，当再次相遇的时候，他们的相遇点为 入环点

function getHuanNode($slow, $fast){
    if($xiangYuDian = hasHuan($slow, $fast)){
        $fast = $xiangYuDian;
        while ($slow !== null && $fast !== null){
            $slow = $slow->next;
            $fast = $fast->next;

            if($slow === $fast) return $slow;
        }
    }

    return null;
}

var_dump(getHuanNode($node1, $node1));
