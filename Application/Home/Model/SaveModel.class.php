<?php
namespace Home\Model;
use Think\Model;

 class SaveModel extends Model{



     //根据用户查询报名情况
     public function saveByUser($limit=null,$where){
         $register=M('save');
         if ($where['rs_savetype']==1){

   //活动收藏
             $knowsdata=$register->table('__SAVE__ a')->join('
            __ACTIVE__ ad on
           a.rs_saveid=ad.ad_id


         ')->where($where)->limit($limit)->order('rs_addtime desc')->getField(
                          "
             ad_id,ad_title,ad_photo

             ");
             foreach ($knowsdata as $k=>$v){
                 if
                 (mb_strlen($knowsdata[$k]['ad_title'], 'utf-8')>C('PERSON_TITLE'))
                 {


                     $knowsdata[$k]['ad_title']=mb_substr($knowsdata[$k]['ad_title'], 0,C('PERSON_TITLE'),'utf-8').'...';
                 }

                 $knowsdata[$k]['url']=__MODULE__.'/Active/active_content/id/'.$v['ad_id'];

             }

//课程收藏
         }elseif ($where['rs_savetype']==2){

             $knowsdata=$register->table('__SAVE__ a')->join('
            __CLASS__ ad on
           a.rs_saveid=ad.mc_id


         ')->where($where)->limit($limit)->order('rs_addtime desc')->getField(
                          "
             mc_id,mc_title,mc_photo

             ");

             foreach ($knowsdata as $k=>$v){
                 if
                 (mb_strlen($knowsdata[$k]['mc_title'], 'utf-8')>C('PERSON_TITLE'))
                 {


                     $knowsdata[$k]['mc_title']=mb_substr($knowsdata[$k]['mc_title'], 0,C('PERSON_TITLE'),'utf-8').'...';
                 }


                 $knowsdata[$k]['url']=__MODULE__.'/Class/class_content/id/'.$v['mc_id'];

             }

//知识收藏
         }elseif ($where['rs_savetype']==3){

             $knowsdata=$register->table('__SAVE__ a')->join('
            __KNOWS__ ad on
           a.rs_saveid=ad.ms_id


         ')->where($where)->limit($limit)->order('rs_addtime desc')->getField(
                          "
             ms_id,ms_title,ms_photo
             ");

             foreach ($knowsdata as $k=>$v){
                 if
                 (mb_strlen($knowsdata[$k]['ms_title'], 'utf-8')>C('PERSON_TITLE'))
                 {


                     $knowsdata[$k]['ms_title']=mb_substr($knowsdata[$k]['ms_title'], 0,C('PERSON_TITLE'),'utf-8').'...';
                 }


                 $knowsdata[$k]['url']=__MODULE__.'/Knows/knows_content/id/'.$v['ms_id'];

             }


         }








         return $knowsdata;
     }


     public function getregistercount($where){
         $register=M('save');

         $count=$register->where($where)->count();
         return $count;

     }




}




?>