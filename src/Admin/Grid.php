<?php


namespace Elyt\Admin\Admin;


use Elyt\Admin\Utils\Database\DbUtil;
use Encore\Admin\Grid   as baseGrid;


class Grid extends   baseGrid
{

    //枚举字段

    public $enumField=[];

    public $dbField=[] ;


    public function column($name, $label = '')
    {



        $find=DbUtil::getOptions($this->enumField,$this->dbField,$name);

        if($find['ret']==true)
        {
            return parent::column($name, $label)->using($find['options']);
        }
        return parent::column($name, $label);


    }


}