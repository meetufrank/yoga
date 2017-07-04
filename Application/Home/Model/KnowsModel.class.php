<?php
namespace Home\Model;
use Think\Model;

 class KnowsModel extends Model{


     public function knowsshow($limit=null,$where){
         $knows=M('knows');
         $nowtime=time();
         $this->updateknows($nowtime);

         $knowsdata=$knows->table('__KNOWS__ a')->join('
            __ADMIN__ ad on
           a.ms_changeadmin=ad.admin_id ')


         -> where($where)->limit($limit)->order('ms_addtime desc')->getField(
             'ms_id,ms_author,ms_title,
             ms_content,ms_photo,ms_addtime,ms_lastchangetime,
             ms_changeadmin,ms_readnum,ms_agreenum,ms_savenum,
             ms_open,ms_top,ms_say,ms_is,ms_back


            ' );



         return $knowsdata;
     }

     //知识列表
     public function knowslist($limit=null,$where){
         $knows=M('knows');
         $nowtime=time();
         $this->updateknows($nowtime);
         $where['ms_back']=0;
         $where['ms_open']=1;

         $knowsdata=$knows->where($where)->limit($limit)->order('ms_top desc,ms_addtime desc')->getField('ms_id,ms_title,ms_addtime,ms_is,ms_readnum,ms_agreenum,ms_savenum,ms_say,ms_photo,ms_top');


         foreach ($knowsdata as $k=>$v){


             $add=date('Y-m-d',$v['ms_addtime']);
             if
             (mb_strlen($knowsdata[$k]['ms_title'], 'utf-8')>C('LIST_TITLE'))
             {


                 $knowsdata[$k]['ms_title']=mb_substr($knowsdata[$k]['ms_title'], 0,C('LIST_TITLE'),'utf-8').'...';
             }
             if (mb_strlen($knowsdata[$k]['ms_say'], 'utf-8')>C('LIST_SAY'))
             {
                 $knowsdata[$k]['ms_say']=mb_substr($knowsdata[$k]['ms_say'], 0,C('LIST_SAY'),'utf-8').'...';

             }

             $knowsdata[$k]['ms_addtime']=$add;
             $knowsdata[$k]['location_url']=__CONTROLLER__.'/knows_content/id/'.$v['ms_id'];


         }






         return $knowsdata;
     }
     public function getknowscount($where){
         $knows=M('knows');
         $nowtime=time();
         $this->updateknows($nowtime);
         $where['ms_back']=0;
         $where['ms_open']=1;
         $count=$knows->where($where)->count();
         return $count;

     }





     //更新知识状态

     public function updateknows($nowtime){


         //更新置顶是否过期
         $where['ms_toptime']=array('elt',$nowtime);
         $where['ms_top']=1;
         M('knows')->where($where)->setField('ms_top',0);
     }

}




?>