<?php


namespace Elyt\Admin\Admin;

use Encore\Admin\Show as baseShow;
use Elyt\Admin\Utils\Database\DbUtil;

class Show extends   baseShow
{

    //枚举字段

    public $enumField=[];

    public $dbField=[] ;


    public function field($name, $label = '')
    {



        $find=DbUtil::getOptions($this->enumField,$this->dbField,$name);

        if($find['ret']==true)
        {
            return parent::field($name, $label)->using($find['options']);
        }
        return parent::field($name, $label);


    }


}