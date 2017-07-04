<?php
namespace Admin\Model;
use Think\Model;

 class ActiveModel extends Model{


     public function activeshow($limit=null,$where){
         $active=M('active');
         $nowtime=time();
         $this->updateactive($nowtime);

         $activedata=$active->table('__ACTIVE__ a')->join('
            __ADMIN__ ad on
           a.ad_author=ad.admin_id ')

           ->join('  __NEWS_CONTENT__  nc on
           a.ad_content=nc.news_content_id')
         -> where($where)->limit($limit)->order('ad_addtime desc')->getField(
             'ad_id,ad_author,ad_title,ad_num,ad_adress,ad_type,
             ad_content,ad_person,ad_tel,ad_maxnum,ad_photo,ad_pay,
             ad_payname,ad_addtime,ad_closingtime,ad_starttime,ad_lastchangetime,
             ad_changeadmin,ad_stoptime,ad_readnum,ad_agreenum,ad_savenum,
             ad_open,ad_valid,ad_top,ad_columnid,ad_say,ad_is,ad_city,ad_sea,ad_back,
             ad_toptime,admin_id,admin_username,news_content_body'

             );


         return $activedata;
     }





     //更新活动状态

     public function updateactive($nowtime){

         //更新过期时间

         $valid['ad_stoptime']=array('elt',$nowtime);
         $valid_two['ad_stoptime']=array('egt',$nowtime);
         M('active')->where($valid)->setField('ad_valid',1);
         M('active')->where($valid_two)->setField('ad_valid',2);


         //更新置顶是否过期
         $where['ad_toptime']=array('elt',$nowtime);
         $where['ad_top']=1;
         M('active')->where($where)->setField('ad_top',0);
     }

}




?>