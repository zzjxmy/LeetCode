<?php
class Node{
    public $value;
    public $next = null;
}

$head = null;
for($i = 5; $i >= 1; $i--){
    $node = new Node();
    $node->value = $i;
    $node->next = $head;
    $head = $node;
}

$temp = null;
while($head){
    $next = $head->next;
    $head->next = $temp;
    $temp = $head;
    $head = $next;
}

return $head;