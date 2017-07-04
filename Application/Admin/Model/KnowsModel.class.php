<?php
namespace Admin\Model;
use Think\Model;

 class KnowsModel extends Model{


     public function knowsshow($limit=null,$where){
         $knows=M('knows');
         $nowtime=time();
         $this->updateknows($nowtime);

         $knowsdata=$knows->table('__KNOWS__ a')->join('
            __ADMIN__ ad on
           a.ms_author=ad.admin_id ')


         -> where($where)->limit($limit)->order('ms_addtime desc')->getField(
             'ms_id,ms_author,ms_title,
             ms_content,ms_photo,ms_addtime,ms_lastchangetime,
             ms_changeadmin,ms_readnum,ms_agreenum,ms_savenum,
             ms_open,ms_top,ms_say,ms_is,ms_back,
             ms_toptime,admin_id,admin_username

            ' );



         return $knowsdata;
     }




     //更新课程状态

     public function updateknows($nowtime){


         //更新置顶是否过期
         $where['ms_toptime']=array('elt',$nowtime);
         $where['ms_top']=1;
         M('knows')->where($where)->setField('ms_top',0);
     }

}




?>