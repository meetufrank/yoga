<?php
namespace Home\Model;
use Think\Model;

 class RegisterModel extends Model{
         protected $tableName="active_register";

     public function registershow($limit=null,$where){
         $register=M('active_register');



         $knowsdata=$register->table('__ACTIVE_REGISTER__ a')->join('
            __MEMBER_LIST__ ad on
           a.ar_userid=ad.member_list_id


         ')
         ->where($where)->limit($limit)->order('ar_open desc')->getField(
           "
             ar_id,ar_name,ar_tel,ar_birthday,ar_sex,ar_more,ar_email,ar_addtime,ar_open,ar_activeid,
             member_list_id,member_list_username,member_list_petname

             ");

         foreach ($knowsdata as $k=>$v){


                 $knowsdata[$k]['age']=birthday($v['ar_birthday']);

         }

         return $knowsdata;
     }

     //根据用户查询报名情况
     public function activeByUser($limit=null,$where){
         $register=M('active_register');



         $knowsdata=$register->table('__ACTIVE_REGISTER__ a')->join('
            __ACTIVE__ ad on
           a.ar_activeid=ad.ad_id


         ')
              ->where($where)->limit($limit)->order('ar_addtime desc')->getField(
                  "
             ad_id,ad_starttime,ad_stoptime,ad_adress,ad_title,ad_photo,
             ar_addtime,ar_open
             ");


         foreach ($knowsdata as $k=>$v){
             if
             (mb_strlen($knowsdata[$k]['ad_title'], 'utf-8')>C('PERSON_TITLE'))
             {


             $knowsdata[$k]['ad_title']=mb_substr($knowsdata[$k]['ad_title'], 0,C('PERSON_TITLE'),'utf-8').'...';
             }

             if (mb_strlen($knowsdata[$k]['ad_adress'], 'utf-8')>C('PERSON_ADDRESS'))
             {
                 $knowsdata[$k]['ad_adress']=mb_substr($knowsdata[$k]['ad_adress'], 0,C('PERSON_ADDRESS'),'utf-8').'...';

             }
             if ($knowsdata[$k]['ar_open']==1){
                 $knowsdata[$k]['style']='color:green;font-size:16px;font-weight:bold;';
                 $knowsdata[$k]['ar_open']='审核通过';
             }else{
                 $knowsdata[$k]['style']='color:red;font-size:16px;font-weight:bold;';
                 $knowsdata[$k]['ar_open']='未审核';


             }

             $knowsdata[$k]['ad_starttime']=date('Y-m-d',$v['ad_starttime']);
             $knowsdata[$k]['ad_stoptime']=date('Y-m-d',$v['ad_stoptime']);
             $knowsdata[$k]['url']=__MODULE__.'/Active/active_content/id/'.$v['ad_id'];

         }

         return $knowsdata;
     }


     public function getregistercount($where){
         $register=M('active_register');

         $count=$register->where($where)->count();
         return $count;

     }




}




?>