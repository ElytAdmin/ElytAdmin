<?php


namespace Elyt\Admin\Utils\Database;


class DbUtil
{


    public static function getOptions($enumField, $dbField, $name)
    {

        $find=false;
        $using='';

        //查找字段是否是枚举字段
        foreach ($enumField as $key=>$value)
        {
            if(strcmp($name,$key)==0)
            {
                $find=true;
                $using=$value;
                break;
            }
        }


        if($find==true) {
            //从枚举中找到
            return [
                'ret'=>true,
                'options'=>config($using),
            ];

        }
        else
        {

            //从枚举中没有找到，检查是否与数据表关联
            foreach ($dbField as $key=>$value)
            {
                if(strcmp($name,$key)==0)
                {
                    $find=true;
                    $using=$value;
                    break;
                }
            }


            if($find==true)
            {

                $options=array();

                $items=$using['modelObject']->get()->toArray();


                foreach($items as $key =>$value)
                {
                    $id=$using['id'];
                    $name=$using['name'];
                    $options[$value[$id]]=$value[$name];

                }


                return [
                    'ret'=>true,
                    'options'=>$options,
                ];
                return parent::select($name, $label)->options($options);
            }
            else
            {
                return [
                    'ret'=>false,
                    'options'=>[],
                ];
            }
        }
    }
}