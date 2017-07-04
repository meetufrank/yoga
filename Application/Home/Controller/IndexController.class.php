<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;


class IndexController extends Controller {


/*
 * 公共控制器，输出导航以及底部提交信息
 */
	Public function _initialize(){
		/*
		 * 公共模块
		 * 主要作用于顶部导航
		 */


	}


/*
 * 首页数据控制器
 */
    public function index(){



        session('location',__SELF__.$_SERVER['QUERY_STRING']);
        cookie('classback',__SELF__.$_SERVER['QUERY_STRING']);
        cookie('activeback',__SELF__.$_SERVER['QUERY_STRING']);
        $nowtime=time();
     D('active')->updateactive($nowtime);
     D('class')->updateclass($nowtime);
        $map['ad_back']=0;
        $map['ad_open']=1;
//         $map['ad_valid']=2;
        $limit=C('INDEX_RIGHT_LIST');
        //查询图片轮播数据
        $plug_banner=M('plug_ad')->where(array('plug_ad_open'=>1,'plug_ad_adtypeid'=>1))->order('plug_ad_order asc')->limit(6)->getField('plug_ad_id,plug_ad_name,plug_ad_url,plug_ad_pic');
        $banner_count=M('plug_ad')->where(array('plug_ad_open'=>1,'plug_ad_adtypeid'=>1))->limit(6)->count();
        //查询活动数据



        $active=M('active')->where($map)->order('ad_addtime desc')->limit($limit)->getField('ad_id,ad_title,ad_addtime,ad_say,ad_photo');


        //查询课程数据
           $map_class['mc_back']=0;
           $map_class['mc_open']=1;
//            $map_class['mc_valid']=array('neq',1);
        $class=M('class')->where($map_class)->order('mc_addtime desc')->limit($limit)->getField('mc_id,mc_title,mc_addtime,mc_say,mc_photo');


        //查询知识数据
        $map_knows['ms_back']=0;
        $map_knows['ms_open']=1;

        $knows=M('knows')->where($map_knows)->order('ms_addtime desc')->limit($limit)->getField('ms_id,ms_title,ms_addtime,ms_say,ms_photo');




      /*
       * 首页显示活动和课程  先精品后普通  按 发布时间来排序先后
       *
       *
       */

        $classdata=M('class_type')->where(array('ct_top'=>1))->limit(0,3)->getField('ct_id,ct_name,ct_say,ct_photo,ct_url,ct_classname');


        $this->assign('banner_count',$banner_count);
        $this->assign('banner',$plug_banner);
        $this->assign('active',$active);
        $this->assign('class',$class);
        $this->assign('knows',$knows);
        $this->assign('classdata',$classdata);


        $this->display();

    }


    public function alldata(){

        $active=D('active');
        $pagenum=C('HM_PAGENUM');
       $page=I('page_num',1);;  //当前页数

        $count=$active->getDataCount();  //获取数据库总条数
        $totalpage=ceil($count/$pagenum);//总计页数

        $limit=($pagenum*($page-1)).",".$pagenum;
        $alldata=$active->getdata($limit);
        $data['data']=$alldata;
        if ($totalpage>$page){
            $data['have_more']=1;
        }else{
            $data['have_more']=0;

        }


       $this->ajaxReturn($data,'JSON',$totalpage);



    }






public function search(){

    $active=D('active');
    $pagenum=C('HM_PAGENUM');
    $page=I('page_num',1);  //当前页数
    $key=I('key');


    $allcount=$active->getsearchCount($key);  //获取数据库总条数

    $Page= new \Think\Page($allcount,C('HM_PAGENUM'));// 实例化分页类 传入总记录数和每页显示的记录数

    $showall= $Page->show();// 分页显示输出

    $limit=$Page->firstRow.','.$Page->listRows;
    $alldata=$active->searchdata($limit,$key);

   $newkey='<em class="keywords">'.$key.'</em>';   //定义新的搜索变量

   foreach ($alldata as $k=>$v){     //个性化标题


           $alldata[$k]['ad_title']=str_replace($key,$newkey , $alldata[$k]['ad_title']);

   }
   //查询活动数据
   $active_map['ad_title']= array('like',"%".$key."%");
   $active_map['ad_back']=0;
   $active_map['ad_open']=1;
   $active_count=M('active')->where($active_map)->count();
   $Page= new \Think\Page($active_count,C('HM_PAGENUM'));// 实例化分页类 传入总记录数和每页显示的记录数

   $activeshow= $Page->show();// 分页显示输出

   $avtive_limit=$Page->firstRow.','.$Page->listRows;

   $activedata=M('active')->where($active_map)->order('ad_addtime desc')->limit($avtive_limit)->getField('ad_id,ad_title,ad_addtime,ad_is,ad_readnum,ad_agreenum,ad_savenum,ad_top');
   foreach ($activedata as $k=>$v){     //个性化标题


       $activedata[$k]['ad_title']=str_replace($key,$newkey , $activedata[$k]['ad_title']);

   }

//查询课程数据
   $class_map['mc_title']= array('like',"%".$key."%");
   $class_map['mc_back']=0;
   $class_map['mc_open']=1;
   $class_count=M('class')->where($class_map)->count();
   $Page= new \Think\Page($class_count,C('HM_PAGENUM'));// 实例化分页类 传入总记录数和每页显示的记录数

   $classshow= $Page->show();// 分页显示输出

   $class_limit=$Page->firstRow.','.$Page->listRows;

   $classdata=M('class')->where($class_map)->order('mc_addtime desc')->limit($class_limit)->getField('mc_id,mc_title,mc_addtime,mc_is,mc_readnum,mc_agreenum,mc_savenum,mc_top');

   foreach ($classdata as $k=>$v){     //个性化标题


       $classdata[$k]['mc_title']=str_replace($key,$newkey , $classdata[$k]['mc_title']);

   }
   //查询知识数据
   $knows_map['ms_title']= array('like',"%".$key."%");
   $knows_map['ms_back']=0;
   $knows_map['ms_open']=1;
   $knows_count=M('knows')->where($knows_map)->count();
   $Page= new \Think\Page($knows_count,C('HM_PAGENUM'));// 实例化分页类 传入总记录数和每页显示的记录数

   $knowsshow= $Page->show();// 分页显示输出

   $knows_limit=$Page->firstRow.','.$Page->listRows;

   $knowsdata=M('knows')->where($knows_map)->order('ms_addtime desc')->limit($knows_limit)->getField('ms_id,ms_title,ms_addtime,ms_is,ms_readnum,ms_agreenum,ms_savenum,ms_top');
   foreach ($knowsdata as $k=>$v){     //个性化标题


       $knowsdata[$k]['ms_title']=str_replace($key,$newkey , $knowsdata[$k]['ms_title']);

   }




    $this->assign('allshow',$showall);
    $this->assign('alldata',$alldata);
    $this->assign('allcount',$allcount);

    //活动渲染
    $this->assign('activeshow',$activeshow);
    $this->assign('activedata',$activedata);
    $this->assign('activecount',$active_count);
    //课程渲染
    $this->assign('classshow',$classshow);
    $this->assign('classdata',$classdata);
    $this->assign('classcount',$class_count);
    //知识渲染
    $this->assign('knowsshow',$knowsshow);
    $this->assign('knowsdata',$knowsdata);
    $this->assign('knowscount',$knows_count);


    $this->assign('key',$key);




    $this->display();
}









}

?>