<?php
namespace Admin\Model;
use Think\Model;

 class ClregisterModel extends Model{
         protected $tableName="class_register";

     public function registershow($limit=null,$where){
         $register=M('class_register');



         $knowsdata=$register->table('__CLASS_REGISTER__ a')->join('
            __MEMBER_LIST__ ad on
           a.cr_userid=ad.member_list_id


         ') ->where($where)->limit($limit)->order('cr_open desc')->getField(
           "
             cr_id,cr_name,cr_tel,cr_birthday,cr_sex,cr_more,cr_email,cr_addtime,cr_open,cr_classid,
             cr_health,cr_address,cr_say,cr_drug,cr_hometype,cr_country,member_list_id,member_list_username,member_list_petname

             ");

        foreach ($knowsdata as $k=>$v){

             $knowsdata[$k]['age']=birthday($v['cr_birthday']);

        }

         return $knowsdata;
     }






}




?>