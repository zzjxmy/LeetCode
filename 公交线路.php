<?php
class Solution {

    public $map = [];
    public $history = []; //历史走过的路
    public $res = [];
    /**
     * @param Integer[][] $routes
     * @param Integer $source
     * @param Integer $target
     * @return Integer
     */
    function numBusesToDestination($routes, $source, $target) {
        //先计算一下，每个站点可以通往哪些站点
        for($i = 0; $i < count($routes); $i++){
            for($j = 0; $j < count($routes[$i]); $j ++){
                $route = $routes[$i][$j];
                $k = $j + 1;
                if(!empty($routes[$i][$k])){
                    //可以通往下一个站点（本车）
                    $this->map[$route][$i][] = $routes[$i][$k];
                }else{
                    //最后一趟，循环
                    $this->map[$route][$i][] = $routes[$i][0];
                }
                $this->map[$route][$i][] = $routes[$i][$j];
            }
        }
        $this->bfs($source, $target);
        if(empty($this->res)) return -1;
        return min($this->res);
    }

    public function bfs($source, $target, $history = []){
//         var_dump($source . '-' . $target);
//         usleep(500000);
        if($source == $target){
            $this->res[] = count($history);
            return;
        }
        $current = $history;
        //从这个站点出发可以到达哪些车站
        foreach($this->map[$source] as $car => $routes){
            for($i = 0; $i < count($routes); $i++){
                if(empty($history[$car][$routes[$i]])){
//                    var_dump('car:' . $car . ' - '. $routes[$i]);
                    $history = $current;
                    //表示已经访问过
                    $history[$car][$routes[$i]] = 1;
                    $this->bfs($routes[$i], $target, $history);
                }
            }
        }
    }
}

$routes = [[25,33],[3,5,13,22,23,29,37,45,49],[15,16,41,47],[5,11,17,23,33],[10,11,12,29,30,39,45],[2,5,23,24,33],[1,2,9,19,20,21,23,32,34,44],[7,18,23,24],[1,2,7,27,36,44],[7,14,33]];
$source = 7;
$target = 47;

$obj = new Solution();
var_dump($obj->numBusesToDestination($routes, $source, $target));