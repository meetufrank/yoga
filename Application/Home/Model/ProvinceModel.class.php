<?php
namespace Home\Model;
use Think\Model\RelationModel;

 class ProvinceModel extends RelationModel{

     protected $_link = array(
         'cities'=>array(
             'mapping_type'  => self::HAS_MANY,
             'class_name'    => 'city',
             'foreign_key'   => 'pid',
             'mapping_fields'=>'id,cityname as name',


             ),
             );



}




?>
