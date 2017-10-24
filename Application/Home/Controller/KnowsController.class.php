<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Com\FxApi;

class KnowsController extends Controller {








    //知识列表加载
    public function knowsload(){

        $this->display();
    }

    //知识列表接口
    public function knows_list(){

        $knows=D('knows');
        $pagenum=C('HM_PAGENUM');
        $page=I('page_num',1);  //当前页数

        $time=I('time');
        $key=I('key');
        if ($key){
            $where['ms_title']=array('like',"%".$key."%");
        }

        $nowtime=time();


        if ($time){
            if ($time=='week'){
                $where['ms_addtime'][]=array('egt',strtotime("-1 week"));
                $where['ms_addtime'][]=array('elt',$nowtime);
            }elseif ($time=='month'){
                $where['ms_addtime'][]=array('egt',strtotime("-1 month"));
                $where['ms_addtime'][]=array('elt',$nowtime);
            }elseif ($time=='year'){
                $where['ms_addtime'][]=array('egt',strtotime("-30 year"));
                $where['ms_addtime'][]=array('elt',$nowtime);
            }
        }



    if ($page<=0){
    $page=1;
    }
        $limit=($pagenum*($page-1)).",".$pagenum;

        $knowsdata=$knows->knowslist($limit,$where);

    //print_r($knows);

        $knows_count=$knows->getknowscount($where);
        $totalpage=ceil($knows_count/$pagenum);//总计页数

        if ($totalpage>$page){
            $data['have_more']=1;
        }else{
            $data['have_more']=0;
        }
        $data['data']=$knowsdata;








       $this->ajaxReturn($data,'JSON',$totalpage);




    }








    //点赞存储
    public function addagree(){
        $id=I('id');
        if (!isset($id)){
            exit();
        }
        $ip=get_client_ip();
        $agreename=$ip.$id;
        $where['ms_id']=$id;
        if (session('?knows_agree'.$id)){
            M('knows')->where($where)->setDec('ms_agreenum');
            session('knows_agree'.$id,null);
            $this->success('取消点赞',1,1);
        }else{
            M('knows')->where($where)->setInc('ms_agreenum');
            session('knows_agree'.$id,$agreename);
            $this->success('点赞+1',1,1);
        }

    }

    //收藏存储
    public function addsave(){
        $id=I('id');
        if (!isset($id)){
            exit();
        }

        if (!cookie('userid')){
            cookie('knows_back',1);
            $this->error('请先登录',U('Login/login'),0);
        }

        $arr=array(
            'rs_saveid'=>$id,
            'rs_userid'=>cookie('userid'),
            'rs_addtime'=>date('Y-m-d H-i-s'),
            'rs_savetype'=>3


        );
        $ip=get_client_ip();
        $agreename=$ip.$id;
        $where['ms_id']=$id;
        $result=M('save')->where(array('rs_saveid'=>$id,'rs_userid'=>cookie('userid'),'rs_savetype'=>3))->count();
        if ($result){
            M('knows')->where($where)->setDec('ms_savenum');
            M('save')->where(array('rs_saveid'=>$id,'rs_userid'=>cookie('userid'),'rs_savetype'=>3))->delete();
            session('knows_save'.$id,null);
            $this->success('取消收藏',1,1);
        }else{
            M('save')->add($arr);
            M('knows')->where($where)->setInc('ms_savenum');
            session('knows_save'.$id,$agreename);
            $this->success('已收藏',1,1);

        }


    }



    //知识详情
    public function knows_content(){



        session('location',__SELF__.$_SERVER['QUERY_STRING']);  //存储当前链接
        $id=I('id');
        $ip=get_client_ip();
        $str=$ip.$id;

        if (!session('?knows_read'.$id)){
            M('knows')->where(array('ms_id'=>$id))->setInc('ms_readnum');
            session('knows_read'.$id,$str);

        }

        if($id){
            $knows=D('knows');
            $where['ms_id']=$id;

            $data=$knows->knowsshow(null,$where);
            //返回的是二维数组，由于根据主键查询值唯一，所以始终仅一条数据
            $data=$data[$id];

            $data['ms_addtime']=date('Y-m-d H:i:s',$data['ms_addtime']);


        }else{
            $this->error('非法操作',1);
        }



        if (session('?knows_agree'.$id)){
            $status=1;

        }else{
            $status=0;
        }
        $result=M('save')->where(array('rs_saveid'=>$id,'rs_userid'=>cookie('userid'),'rs_savetype'=>3))->count();
        if ($result){
            $save_status=1;
        }else{
            $save_status=0;
        }
//分享二维码
        $jssdk = new FxApi(C('APPID'), C('AppSECRET'));
        $signPackage = $jssdk->GetSignPackage();
        $this->assign('signPackage', $signPackage);
        $this->assign('drumpurl', 'http://'.$_SERVER['HTTP_HOST'].__SELF__.$_SERVER['QUERY_STRING']); //当前链接
        $this->assign('imgurl', 'http://'.$_SERVER['HTTP_HOST'].'/Public'); //微信分享图片链接前缀
        $this->assign('knows',$data);
        $this->assign('agree',$status);
        $this->assign('save_status',$save_status);

        $this->display();
    }















    }

















?>