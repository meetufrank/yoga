<?php
namespace Home\Model;
use Think\Model;

 class ClassModel extends Model{








     public function classshow($limit=null,$where){
         $class=M('class');
         $nowtime=time();
         $this->updateclass($nowtime);

         $classdata=$class->table('__CLASS__ a')->join('
            __ADMIN__ ad on
           a.mc_changeadmin=ad.admin_id ')

           ->join('  __NEWS_CONTENT__  nc on
           a.mc_content=nc.news_content_id')->join('
               __CLASS_TYPE__  ct on
           a.mc_type=ct.ct_id
               ')

         -> where($where)->limit($limit)->order('mc_addtime desc')->getField(
             'mc_id,mc_author,mc_title,mc_num,mc_adress,mc_type,mc_idnum,
             mc_content,mc_person,mc_teacher,mc_worker,mc_tel,mc_maxnum,mc_photo,mc_pay,
             mc_payname,mc_addtime,mc_closingtime,mc_starttime,mc_lastchangetime,
             mc_changeadmin,mc_stoptime,mc_readnum,mc_agreenum,mc_savenum,
             mc_open,mc_valid,mc_top,mc_say,mc_is,mc_sea,mc_back,
             mc_toptime,admin_id,admin_username,news_content_body,ct_name,ct_englishname,ct_type_one,ct_id

            ' );



         return $classdata;
     }




     //更新课程状态

     public function updateclass($nowtime){

         //更新当前状态

         $valid['mc_stoptime']=array('elt',$nowtime);
         $valid_two['mc_stoptime']=array('egt',$nowtime);
         $valid_two['mc_starttime']=array('elt',$nowtime);
         $valid_three['mc_starttime']=array('egt',$nowtime);
         M('class')->where($valid)->setField('mc_valid',1);  //已结束
         M('class')->where($valid_two)->setField('mc_valid',2);   //进行中
         M('class')->where($valid_three)->setField('mc_valid',3);   //预约中

         //更新置顶是否过期
         $where['mc_toptime']=array('elt',$nowtime);
         $where['mc_top']=1;
         M('class')->where($where)->setField('mc_top',0);
     }



//课程列表
public function classlist($limit=null,$where=null,$type=null){
    $class=M('class');
    $nowtime=time();
    $this->updateclass($nowtime);
    $where['mc_back']=0;
    $where['mc_open']=1;
    if ($type==1){
        $where['mc_valid']=1;
    }
    $classdata=$class->where($where)->limit($limit)->order('mc_top desc,mc_addtime desc')->getField('mc_id,mc_title,mc_addtime,mc_is,mc_readnum,mc_agreenum,mc_savenum,mc_say,mc_photo,mc_top,mc_starttime,mc_stoptime,mc_adress');


    foreach ($classdata as $k=>$v){


        $stop=date('Y-m-d',$v['mc_stoptime']);
        $start=date('Y-m-d',$v['mc_starttime']);

        $classdata[$k]['mc_stoptime']=$stop;
        if
        (mb_strlen($classdata[$k]['mc_title'], 'utf-8')>C('LIST_TITLE'))
        {

            $classdata[$k]['mc_title']=mb_substr($classdata[$k]['mc_title'], 0,C('LIST_TITLE'),'utf-8').'...';
        }
        if (mb_strlen($classdata[$k]['mc_say'], 'utf-8')>C('LIST_SAY'))
        {
            $classdata[$k]['mc_say']=mb_substr($classdata[$k]['mc_say'], 0,C('LIST_SAY'),'utf-8').'...';

        }
        if (mb_strlen($classdata[$k]['mc_adress'], 'utf-8')>C('CLASS_ADDRESS'))
        {
            $classdata[$k]['mc_adress']=mb_substr($classdata[$k]['mc_adress'], 0,C('CLASS_ADDRESS'),'utf-8').'...';

        }


        $classdata[$k]['mc_starttime']=$start;
        $classdata[$k]['location_url']=__CONTROLLER__.'/class_content/id/'.$v['mc_id'];


    }






    return $classdata;
}
public function getclasscount($where=null,$type=null){
    $class=M('class');
    $nowtime=time();
    $this->updateclass($nowtime);
    $where['mc_back']=0;
    $where['mc_open']=1;
if ($type==1){
        $where['mc_valid']=1;
    }
    $count=$class->where($where)->count();
    return $count;

}




}




?>
