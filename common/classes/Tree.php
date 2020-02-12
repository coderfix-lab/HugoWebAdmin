<?php
namespace app\common\classes;

use app\components\PHPTree\PHPTree;

class Tree {

    static function getDropData($array){
        $re =  PHPTree::makeTreeForHtml($array,[
            'primary_key' => 'id',
            'parent_key' => 'pid']);

        foreach($re as $k => $item){
            $re[$k]['name'] = str_repeat('-',$item['level'])." ".$re[$k]['name'];
        }
        return $re;
    }


}

?>

