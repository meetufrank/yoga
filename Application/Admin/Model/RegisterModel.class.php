<?php
namespace Admin\Model;
use Think\Model;

 class RegisterModel extends Model{
         protected $tableName="active_register";

     public function registershow($limit=null,$where){
         $register=M('active_register');



         $knowsdata=$register->table('__ACTIVE_REGISTER__ a')->join('
            __MEMBER_LIST__ ad on
           a.ar_userid=ad.member_list_id


         ') ->where($where)->limit($limit)->order('ar_open desc')->getField(
           "
             ar_id,ar_name,ar_tel,ar_birthday,ar_sex,ar_more,ar_email,ar_addtime,ar_open,ar_activeid,
             ar_say,member_list_id,member_list_username,member_list_petname

             ");

         foreach ($knowsdata as $k=>$v){

                 $knowsdata[$k]['age']=birthday($v['ar_birthday']);

         }

         return $knowsdata;
     }








}




?>