<?php
namespace Home\Model;
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
             cr_health,cr_address,cr_drug,cr_hometype,cr_country,member_list_id,member_list_username,member_list_petname

             ");

        foreach ($knowsdata as $k=>$v){


             $knowsdata[$k]['age']=birthday($v['cr_birthday']);

        }

         return $knowsdata;
     }






     //根据用户查询报名情况
     public function classByUser($limit=null,$where){
         $register=M('class_register');



         $knowsdata=$register->table('__CLASS_REGISTER__ a')->join('
            __CLASS__ ad on
           a.cr_classid=ad.mc_id


         ')
              ->where($where)->limit($limit)->order('cr_addtime desc')->getField(
                  "
             mc_id,mc_starttime,mc_stoptime,mc_adress,mc_title,mc_photo,
             cr_addtime,cr_open
             ");


         foreach ($knowsdata as $k=>$v){
             if
             (mb_strlen($knowsdata[$k]['mc_title'], 'utf-8')>C('PERSON_TITLE'))
             {


                 $knowsdata[$k]['mc_title']=mb_substr($knowsdata[$k]['mc_title'], 0,C('PERSON_TITLE'),'utf-8').'...';
             }
             if (mb_strlen($knowsdata[$k]['mc_adress'], 'utf-8')>C('PERSON_ADDRESS'))
             {
                 $knowsdata[$k]['mc_adress']=mb_substr($knowsdata[$k]['mc_adress'], 0,C('PERSON_ADDRESS'),'utf-8').'...';

             }
            if ($knowsdata[$k]['cr_open']==1){
                 $knowsdata[$k]['style']='color:green;font-size:16px;font-weight:bold;';
                 $knowsdata[$k]['cr_open']='审核通过';
             }else{
                 $knowsdata[$k]['style']='color:red;font-size:16px;font-weight:bold;';
                 $knowsdata[$k]['cr_open']='未审核';


             }
             $knowsdata[$k]['mc_starttime']=date('Y-m-d',$v['mc_starttime']);
             $knowsdata[$k]['mc_stoptime']=date('Y-m-d',$v['mc_stoptime']);
             $knowsdata[$k]['url']=__MODULE__.'/Class/class_content/id/'.$v['mc_id'];

         }

         return $knowsdata;
     }


     public function getregistercount($where){
         $register=M('class_register');

         $count=$register->where($where)->count();
         return $count;

     }





}




?>