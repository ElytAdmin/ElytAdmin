<?php


namespace Elyt\Admin\Admin;

use Elyt\Admin\Utils\Database\DbUtil;

use Encore\Admin\Form   as baseForm;;



class Form extends   baseForm
{


    /*枚举字段，即数据表中的某个字段是integer ,其值对应于固定的常量数组 ，即MYSQL 中的enum

      $this->enumField = [
            'wellType' => WELL_TYPE,
            'wellState' => WELL_STATE,
            'wellPurpose' => WELL_PURPOSE,
            'wellRoomForm' => WELL_ROOM_FORM,
            'powerSupplySituation' => POWER_SUPPLY_SITUATION,
            'waterLevelMonitoring' => WATER_LEVEL_MONITORING,
            'wellForm' => WELL_FORM


        ];
    */
    public $enumField=[];


    /**
     *
    $this->dbField=[
        'station_id' =>[
        'modelObject'=> (new Station),

        'id' => 'id',
        'name' => 'stationName'
        ]  ,

    ];
     */
    public $dbField=[] ;


    public function number($name, $label = '')
    {

        $find=DbUtil::getOptions($this->enumField,$this->dbField,$name);

        if($find['ret']==true)
        {
            return parent::select($name, $label)->options($find['options']);
        }
        return parent::number($name, $label)->width('100%');

    }






    public function decimal($name, $label = '')
    {
        return parent::decimal($name,$label)->width('100%');
    }

}