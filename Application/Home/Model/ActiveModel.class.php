<?php
namespace Home\Model;
use Think\Model;

 class ActiveModel extends Model{


public function getdata($limit=null,$where=null){
    $time=time();
    $this->updateactive($time);
    $class=D('class');
    $class->updateclass($time);


    $sql="
        select ad_id,ad_title,ad_addtime,ad_starttime,ad_stoptime,ad_is,ad_readnum,ad_agreenum,ad_savenum,ad_say,ad_photo,ad_top from mr_active where ad_back=0 and ad_open=1 and ad_valid=2

            union all

            select mc_id,mc_title,mc_addtime,mc_starttime,mc_stoptime,mc_is,mc_readnum,mc_agreenum,mc_savenum,mc_say,mc_photo,mc_top from mr_class  where mc_back=0 and mc_open=1 and mc_valid!=1

        union all

            select ms_id,ms_title,ms_addtime,ms_starttime,ms_stoptime,ms_is,ms_readnum,ms_agreenum,ms_savenum,ms_say,ms_photo,ms_top from mr_knows  where ms_back=0 and ms_open=1 and ms_valid=1



            order by ad_top desc,ad_addtime desc limit
        ".$limit;



    $data=$this->query($sql);


    foreach ($data as $k=>$v){


        $stop=date('Y-m-d',$v['ad_stoptime']);
        $start=date('Y-m-d',$v['ad_starttime']);

        $data[$k]['ad_stoptime']=$stop;

        $data[$k]['ad_starttime']=$start;
        $data[$k]['ad_addtime']=date('Y-m-d',$v['ad_addtime']);

        if
        (mb_strlen($data[$k]['ad_title'], 'utf-8')>C('INDEX_TITLE'))
        {
            $data[$k]['ad_title']=mb_substr($data[$k]['ad_title'], 0,C('INDEX_TITLE'),'utf-8').'...';
        }

        if(mb_strlen($data[$k]['ad_say'], 'utf-8')>C('INDEX_SAY'))
        {
            $data[$k]['ad_say']=mb_substr($data[$k]['ad_say'], 0,C('INDEX_SAY'),'utf-8').'...';

        }


        if ($data[$k]['ad_is']==1){

            $data[$k]['location_url']=__MODULE__.'/active/active_content/id/'.$v['ad_id'];
            $data[$k]['is_logo']=__ROOT__.'/Public/yoga/img/active.png';
        }
        if ($data[$k]['ad_is']==2){
            $data[$k]['location_url']=__MODULE__.'/class/class_content/id/'.$v['ad_id'];
            $data[$k]['is_logo']=__ROOT__.'/Public/yoga/img/circle.png';
        }
        if ($data[$k]['ad_is']==3){
            $data[$k]['location_url']=__MODULE__.'/knows/knows_content/id/'.$v['ad_id'];
            $data[$k]['is_logo']=__ROOT__.'/Public/yoga/img/knows.png';
        }



    }
    return $data;
}

public function getDataCount(){
    $sql="select count(*) as total from (
        select ad_id from mr_active where ad_back=0 and ad_open=1 and ad_valid=2

            union all

            select mc_id from mr_class  where mc_back=0 and mc_open=1 and mc_valid!=1

        union all

            select ms_id from mr_knows  where ms_back=0 and ms_open=1 and ms_valid=1



        ) data
        ";


    $count=$this->query($sql);

    return $count[0]['total'];
}

//活动详情
public function activeshow($limit=null,$where,$type=null){
    $active=M('active');
    $nowtime=time();
    $this->updateactive($nowtime);
    $where['ad_back']=0;
    $where['ad_open']=1;

    $activedata=$active->table('__ACTIVE__ a')->join('
            __ADMIN__ ad on
           a.ad_changeadmin=ad.admin_id ')

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
//活动列表
public function activelist($limit=null,$where,$type=null){
    $active=M('active');
    $nowtime=time();
    $this->updateactive($nowtime);
    $where['ad_back']=0;
    $where['ad_open']=1;
    if ($type==1){
        $where['ad_valid']=1;
    }elseif($type==2){
        $where['ad_valid']=2;
    }

    $activedata=$active->where($where)->limit($limit)->order('ad_top desc,ad_addtime desc')->getField('ad_id,ad_title,ad_addtime,ad_is,ad_readnum,ad_agreenum,ad_savenum,ad_say,ad_photo,ad_top,ad_starttime,ad_stoptime,ad_adress');


    foreach ($activedata as $k=>$v){


        $stop=date('Y-m-d',$v['ad_stoptime']);
        $start=date('Y-m-d',$v['ad_starttime']);
        if (mb_strlen($activedata[$k]['ad_say'], 'utf-8')>C('LIST_SAY'))
        {

            $activedata[$k]['ad_say']=mb_substr($activedata[$k]['ad_say'], 0,C('LIST_SAY'),'utf-8').'...';

        }
        if (mb_strlen($activedata[$k]['ad_title'], 'utf-8')>C('LIST_TITLE'))
        {
            $activedata[$k]['ad_title']=mb_substr($activedata[$k]['ad_title'], 0,C('LIST_TITLE'),'utf-8').'...';

        }
        if (mb_strlen($activedata[$k]['ad_adress'], 'utf-8')>C('CLASS_ADDRESS'))
        {
            $activedata[$k]['ad_adress']=mb_substr($activedata[$k]['ad_adress'], 0,C('CLASS_ADDRESS'),'utf-8');

        }

        $activedata[$k]['ad_stoptime']=$stop;
        $activedata[$k]['ad_starttime']=$start;
        $activedata[$k]['location_url']=__CONTROLLER__.'/active_content/id/'.$v['ad_id'];


    }






    return $activedata;
}
public function getactivecount($where,$type=null){
    $active=M('active');
    $nowtime=time();
    $this->updateactive($nowtime);
    $where['ad_back']=0;
    $where['ad_open']=1;
   if ($type==1){
        $where['ad_valid']=1;
    }elseif($type==2){
        $where['ad_valid']=2;
    }

    $count=$active->where($where)->count();
    return $count;

}

//更新活动状态

public function updateactive($nowtime){

    //更新过期时间

    $valid['ad_stoptime']=array('elt',$nowtime);
    $valid['ad_closingtime']=array('elt',$nowtime);
    $valid_two['ad_stoptime']=array('egt',$nowtime);
    $valid_two['ad_closingtime']=array('egt',$nowtime);
    M('active')->where($valid)->setField('ad_valid',1);
    M('active')->where($valid_two)->setField('ad_valid',2);


    //更新置顶是否过期
    $where['ad_toptime']=array('egt',$nowtime);
    M('active')->where($where)->setField('ad_top',0);
}





//标题三表搜索
public function searchdata($limit=null,$where=null){
    $time=time();
    $this->updateactive($time);
    $class=D('class');
    $class->updateclass($time);


    $sql="
        select ad_id,ad_title,ad_addtime,ad_is,ad_readnum,ad_agreenum,ad_savenum,ad_top from mr_active where ad_back=0 and ad_open=1  and ad_title like '%".$where."%'

            union all

            select mc_id,mc_title,mc_addtime,mc_is,mc_readnum,mc_agreenum,mc_savenum,mc_top from mr_class  where mc_back=0 and mc_open=1  and mc_title like '%".$where."%'

        union all

            select ms_id,ms_title,ms_addtime,ms_is,ms_readnum,ms_agreenum,ms_savenum,ms_top from mr_knows  where ms_back=0 and ms_open=1  and ms_title like '%".$where."%'



            order by ad_top desc,ad_addtime desc limit
        ".$limit;



    $data=$this->query($sql);


    foreach ($data as $k=>$v){






        if ($data[$k]['ad_is']==1){
            $data[$k]['is_name']='活动';

            $data[$k]['location_url']=__MODULE__.'/active/active_content/id/'.$v['ad_id'];
        }
        if ($data[$k]['ad_is']==2){
            $data[$k]['is_name']='课程';
            $data[$k]['location_url']=__MODULE__.'/class/class_content/id/'.$v['ad_id'];
        }
        if ($data[$k]['ad_is']==3){
            $data[$k]['is_name']='知识';
            $data[$k]['location_url']=__MODULE__.'/knows/knows_content/id/'.$v['ad_id'];
        }



    }
    return $data;



}
//搜索标题信息
public function getsearchCount($where=null){

    $sql="select count(*) as total from (
        select ad_id from mr_active where ad_back=0 and ad_open=1  and ad_title like '%".$where."%'

            union all

            select mc_id from mr_class  where mc_back=0 and mc_open=1  and mc_title like '%".$where."%'

        union all

            select ms_id from mr_knows  where ms_back=0 and ms_open=1   and ms_title like '%".$where."%'



        ) data
        ";


    $count=$this->query($sql);

    return $count[0]['total'];
}



}

?>
